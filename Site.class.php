<?php
require_once 'DB.class.php';
require_once 'GameZone.class.php';
require_once 'Ship.class.php';
require_once 'Scout.class.php';
/**
 *
 */
class Site
{
  public static function login($login, $pass)
  {
    if (!$login || !$pass)
      throw new Exception("Please fill all fields");
    if (!$res = DB::query("SELECT * FROM `users` WHERE `login` LIKE BINARY '"
                            . DB::esc($login) . "' AND `pass` LIKE BINARY '"
                            . DB::esc(Site::hash($pass)) . "';"))
    {
      throw new Exception("DATABASE ERROE IN LOGIN");
    }
    if ($res->num_rows == 0)
      throw new Exception("Wrong credentials");
    $_SESSION['login'] = $login;
    return ("Successfull login");
  }

  public static function hash($str)
  {
    return hash("gost", $str."my_nice sault");
  }

  public static function register($login, $pass)
  {
    if (!$login || !$pass)
      throw new Exception("Please fill all fields");

    if (!$res = DB::query("SELECT * FROM `users` WHERE `login` LIKE BINARY '"
                            . DB::esc($login) . "';"))
    {
      throw new Exception("DATABASE ERROE IN register");
    }
    if ($res->num_rows != 0)
    {
      throw new Exception("User alredy exists");
    }

    if (!$res = DB::query(" INSERT INTO `users` (`uid`, `login`, `pass`)
                            VALUES (NULL, '" . DB::esc($login) . "', '" .
                            DB::esc(Site::hash($pass)) . "');"))
    {
      throw new Exception("DATABASE ERROE IN register");
    }
    if ($res == True)
    {
      return "Successfull registration";
    }
  }

  public static function logout()
  {
    header("Location: index.php");
    if (key_exists('login', $_SESSION))
      unset($_SESSION['login']);
    return "logged out";
  }

  public static function newGame($num_players)
  {
    if (!key_exists('login', $_SESSION) || !isset($_SESSION['login']))
      throw new Exception("You are not logged");
    //Check if player in game
    if (key_exists('gid', $_SESSION) && isset($_SESSION['gid']))
    {
      throw new Exception("You are alredy in game!");
    }
    if ($num_players < 2 || $num_players > 4)
      throw new Exception("Choose 2-4 players");

    if (!$res = DB::query(
      "SELECT `gid` FROM `game_init`
      WHERE `uid1` = (SELECT `uid` FROM `users` WHERE `login` LIKE BINARY '".DB::esc($_SESSION['login'])."')"."
      OR `uid2` = (SELECT `uid` FROM `users` WHERE `login` LIKE BINARY '".DB::esc($_SESSION['login'])."') "."
      OR `uid3` = (SELECT `uid` FROM `users` WHERE `login` LIKE BINARY '".DB::esc($_SESSION['login'])."') "."
      OR `uid4` = (SELECT `uid` FROM `users` WHERE `login` LIKE BINARY '".DB::esc($_SESSION['login'])."');"
      ))
    {
      throw new Exception("DB ERROR");
    }
    if ($res->num_rows != 0)
      throw new Exception("You are alredy in game2");
    //insert new game to table
    if (!$res = DB::query(
      "INSERT INTO `game_init` (`gid`, `uid1`, `size`)
      VALUES (NULL,
        (SELECT uid FROM `users` WHERE `login` like BINARY '" . DB::esc($_SESSION['login'])."'), '"
        . DB::esc($num_players) . "');"))
    {
      throw new Exception("DATABASE ERROE IN newGame1".(DB::getMysqliInstance()->error));
    }
    if ($res == True)
    {
      if (!$res = DB::query(
        "SELECT `gid` FROM `game_init`
        WHERE `uid1` = (SELECT `uid` FROM `users` WHERE `login` LIKE BINARY '".DB::esc($_SESSION['login'])."');"
        ))
      {
        throw new Exception("DATABASE ERROE IN newGame2".(DB::getMysqliInstance()->error));
      }
      $arr = $res->fetch_assoc();
      $_SESSION['gid'] = $arr['gid'];
      $_SESSION['team'] = 0;
      return "Game created";
    }
  }

  public static function joinGame($gid)
  {
    if (!$res = DB::query("SELECT * FROM `game_init` WHERE `gid` ='".$gid."'" ))
      throw new Exception("DATABASE ERROE IN newGame1".(DB::getMysqliInstance()->error));
    $rows = $res->fetch_assoc();
    if ($rows['user_count'] >= $rows['size'])
      throw new Exception("Game is Full");


    if (!$res = DB::query("SELECT `uid` FROM `users` WHERE `login` LIKE BINARY '".DB::esc($_SESSION['login'])."'" ))
      throw new Exception("DATABASE ERROE IN newGame1".(DB::getMysqliInstance()->error));
    $your_uid = $res->fetch_assoc()['uid'];
    if ($rows['uid1'] == $your_uid || $rows['uid2'] == $your_uid || $rows['uid3'] == $your_uid || $rows['uid4'] == $your_uid)
    {
      header("Location: game.php");
      return ;
    }

    $i_u = $rows['user_count'] + 1;
    $_SESSION['gid'] = $rows['gid'];
    $_SESSION['team'] = $i_u - 1;
    if (!$res = DB::query(
      "UPDATE `game_init` SET `uid".$i_u."`="
      ."(SELECT `uid` FROM `users` WHERE `login` LIKE BINARY '".DB::esc($_SESSION['login']). "')"
      .", `user_count`=".$i_u
      ."  WHERE `gid` = ".$rows['gid'].";"
      ))
      throw new Exception("DATABASE ERROE IN newGame1".(DB::getMysqliInstance()->error));
    header("Location: game.php");
  }

  public static function viewAllGames()
  {
    if (!key_exists('login', $_SESSION) || !isset($_SESSION['login']))
      throw new Exception("You are not logged");
    if (!$res = DB::query("SELECT * FROM `game_init`"))
      throw new Exception("DATABASE ERROE IN newGame1".(DB::getMysqliInstance()->error));
    if ($res->num_rows == 0)
      return ("<b>No game active :( Create your own!</b>");
    $rows = array();
    while ($row = $res->fetch_assoc())
      $rows[] = $row;
    foreach ($rows as $key => $row)
    {
      for ($i=1; $i <= 4; $i++)
      {
        if ($row['uid'.$i])
        {
          if (!$res = DB::query("SELECT `login` FROM `users` WHERE `uid` ='".$row["uid{$i}"]."';"))
            throw new Exception("DATABASE ERROE IN newGame1".(DB::getMysqliInstance()->error));
          $rows[$key]['uid'.$i] = $res->fetch_assoc()['login'];
        }
        else
        {
          $rows[$key]['uid'.$i] = "--";
        }
      }
    }
    $res = "";
    foreach ($rows as $crow)
    {
      $res = $res . "<tr> "
      ."<td>p1: ". $crow['uid1']
      ."</td><td> p2:".$crow['uid2']
      ."</td><td> p3:".$crow['uid3']
      ."</td><td> p4:".$crow['uid4']
      ."</td><td> size:".$crow['user_count']."/".$crow['size']."</td>  "
      ."<td><form action='ajax.php?action=join' method='post'>"
      ."<input type='submit' name='join' value='".$crow['gid']."'' "
      .(($crow['user_count'] >= $crow['size']) ? "disabled" : "")
      ."></td></form></tr>";
    }
    // echo "$res";
    return ($res);
  }

  public static function saveGameZone($gz)
  {
    if (!key_exists('login', $_SESSION) || !isset($_SESSION['login']))
      throw new Exception("You are not logged");
    if (!key_exists('gid', $_SESSION) || !isset($_SESSION['gid']))
      throw new Exception("You are not in game");

    if (!$res = DB::query(
      "UPDATE `game_zone` SET `gz`='".serialize($gz)."' WHERE `gid`=".$_SESSION['gid'].";"
      ))
      throw new Exception("DATABASE ERROE IN newGame1".(DB::getMysqliInstance()->error));
  }

  public static function loadGameZone()
  {
    if (!key_exists('login', $_SESSION) || !isset($_SESSION['login']))
      throw new Exception("You are not logged");
    if (!key_exists('gid', $_SESSION) || !isset($_SESSION['gid']))
      throw new Exception("You are not in game");

    if (!$res = DB::query(
      "SELECT * FROM `game_zone` WHERE `gid` = '".$_SESSION['gid']."';"
      ))
      throw new Exception("DATABASE ERROE IN newGame1".(DB::getMysqliInstance()->error));
    if ($res->num_rows == 0)
    {
      if (!$res = DB::query(
        "SELECT `size` FROM `game_init` WHERE `gid` = ".$_SESSION['gid'].";"
        ))
        throw new Exception("DATABASE ERROE IN newGame2");
      $arr = $res->fetch_assoc();
      $num_players = $arr['size'];
      $gz = new GameZone($num_players);
      if (!$res = DB::query(
        "INSERT INTO `game_zone` (`gid`, `gz`) VALUES (".$_SESSION['gid'].", '".(serialize($gz))."');"
        ))
        throw new Exception("DATABASE ERROE IN newGame3");
    }
    else
    {
      $arr = $res->fetch_assoc();
      $gz = unserialize($arr['gz']);
    }
    return $gz;
  }

  public function delGame($gid)
  {
    if (!key_exists('login', $_SESSION) || !isset($_SESSION['login']))
      throw new Exception("You are not logged");
    if (!key_exists('gid', $_SESSION) || !isset($_SESSION['gid']))
      throw new Exception("You are not in game");
    header("Location: index.php");
    if (!$res = DB::query(
      "DELETE FROM `game_zone` WHERE `gid` = '".$_SESSION['gid']."';"
      ))
      throw new Exception("DATABASE ERROE IN newGame1".(DB::getMysqliInstance()->error));
    if (!$res = DB::query(
      "DELETE FROM `game_init` WHERE `gid` = '".$_SESSION['gid']."';"
      ))
      throw new Exception("DATABASE ERROE IN newGame1".(DB::getMysqliInstance()->error));
    $_SESSION['gid'] = Null;
  }
}

 ?>
