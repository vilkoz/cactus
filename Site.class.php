<?php
require_once 'DB.class.php';
/**
 *
 */
function login($login, $pass)
{
  if (!$login || !$pass)
    throw new Exception("Please fill all fields");
  if (!$res = DB::query("SELECT * FROM `users` WHERE `login` LIKE BINARY '"
                          . DB::esc($login) . "' AND `pass` LIKE BINARY '"
                          . DB::esc(hash_my($pass)) . "';"))
  {
    throw new Exception("DATABASE ERROE IN LOGIN");
  }
  if ($res->num_rows == 0)
    throw new Exception("Wrong credentials");
  $_SESSION['login'] = $login;
  return ("Successfull login");
}

function hash_my($str)
{
  return hash("gost", $str."my_nice sault");
}

function register($login, $pass)
{
  if (!$login || !$pass)
    throw new Exception("Please fill all fields");

  if (!$res = DB::query("SELECT * FROM `users` WHERE `login` LIKE BINARY '"
                          . DB::esc($login) . "';"))
  {
    throw new Exception("DATABASE ERROR IN register");
  }
  if ($res->num_rows != 0)
  {
    throw new Exception("User alredy exists");
  }

  if (!$res = DB::query(" INSERT INTO `users` (`id`, `login`, `pass`)
                          VALUES (NULL, '" . DB::esc($login) . "', '" .
                          DB::esc(hash_my($pass)) . "');"))
  {
    throw new Exception("DATABASE ERROE IN register");
  }
  if ($res == True)
  {
    return "Successfull registration";
  }
}

function check_logged()
{
  if (!key_exists('login', $_SESSION) || !isset($_SESSION['login']))
    throw new Exception("You are not logged");
}

function get_uid()
{
  if (!key_exists('login', $_SESSION) || !isset($_SESSION['login']))
    throw new Exception("You are not logged");
  if (!$res = DB::query("SELECT `id` FROM `users` WHERE `login` LIKE BINARY '"
                          . DB::esc($_SESSION['login']) . "';"))
  {
    throw new Exception("DATABASE ERROR IN get_uid". DB::esc($_SESSION['login']));
  }
  if ($res->num_rows == 0)
  {
    throw new Exception("User not found!".DB::esc($_SESSION['login']));
  }
  return ($res->fetch_assoc()['id']);
}

function get_interest_id($name)
{
  check_logged();
  if (!$res = DB::query("SELECT `id` FROM `interests` WHERE `name` LIKE BINARY '"
                          . DB::esc($name) . "';"))
  {
    throw new Exception("DATABASE ERROR IN get_uid". DB::esc($_SESSION['login']));
  }
  if ($res->num_rows == 0)
  {
    throw new Exception("interest not found");
  }
  return ($res->fetch_assoc()['id']);
}

function edit_profile($name, $surname, $bd, $gender, $number)
{
  check_logged();
  $uid = get_uid();
  if (!$res = DB::query("UPDATE `users` SET `name` = '".DB::esc($name).
  "', `surname` = '".DB::esc($surname).
  "', `gender` = '".DB::esc($gender).
  "', `number` = '".DB::esc($number)
  ."' WHERE `users`.`id` = ".$uid.";"))
  {
    throw new Exception("DATABASE ERROR IN edit_profile");
  }
  return ("Successfully updated!");
}

function edit_preference($action, $idi)
{
  check_logged();
  $uid = get_uid();
  if ($action == "add")
  {
    if (!$res = DB::query("SELECT * FROM `preferences` WHERE `idu` LIKE '"
                            . $uid . "';"))
    {
      throw new Exception("DATABASE ERROR IN edit_pref");
    }
    if ($res->num_rows != 0)
    {
      if (!$res = DB::query(" INSERT INTO `preferences` (`id`, `idu`, `idi`)
                              VALUES (NULL, '" . $uid . "', '" .
                              intval($idi) . "');"))
      {
        throw new Exception("DATABASE ERROE IN edit_prefr");
      }
      if ($res == True)
      {
        return "Added preference!";
      }
    }
    else
    {
        throw new Exception("preference already exists");
    }
  }
  else if ($action == "del")
  {
    if (!$res = DB::query("SELECT * FROM `preferences` WHERE `idu` LIKE '"
                            . $uid . "';"))
    {
      throw new Exception("DATABASE ERROR IN edit_pref");
    }
    if ($res->num_rows != 0)
    {
      throw new Exception("You do not have this preference!");
    }
    else
    {
      if (!$res = DB::query("DELETE FROM `preferences` WHERE `idi` = ".
        intval($idi).""))
      {
        throw new Exception("DATABASE ERROE IN edit_prefr");
      }
      if ($res == True)
      {
        return "Deleted preference!";
      }
    }
  }
}

function list_interests()
{
  check_logged();
  $uid = get_uid();
  if (!$res = DB::query("SELECT `idi` FROM `preferences`
    WHERE `idu` = " . intval($uid) . ";"))
  {
    throw new Exception("DATABASE ERROR IN list interests");
  }
  if ($res->num_rows == 0)
  {
    throw new Exception("No preferences found");
  }
  $user_prefs = array();
  while ($add = ($res->fetch_assoc()))
  {
    $user_prefs[] = $add['idi'];
  }
  if (!$res = DB::query("SELECT `id`, `name` FROM `interests`;"))
  {
    throw new Exception("DATABASE ERROR IN list interests");
  }
  if ($res->num_rows == 0)
  {
    throw new Exception("No interests found");
  }
  // $return = "";
  while ($new = $res->fetch_assoc())
  {
    $name = $new['name'];
    $id = $new['id'];
    if (!in_array($id, $user_prefs))
      $return .= "<div class='list_inter'>".$name."<input type='submit' value='".$id."'></div></br>";
  }
  return ($return);
}

function list_preferences()
{
  check_logged();
  $uid = get_uid();
  if (!$res = DB::query("SELECT `interests`.`id`, `interests`.`name`
    FROM `preferences`
    JOIN `interests` ON `preferences`.`idi` = `interests`.`id`
    WHERE `preferences`.`idu` = ".intval($uid).";"))
  {
    throw new Exception("DATABASE ERROR IN list preferences");
  }
  if ($res->num_rows == 0)
  {
    throw new Exception("No preferences found");
  }
  $return = "";
  while ($prefs = $res->fetch_assoc())
  {
    $name = $prefs['name'];
    $id = $prefs['id'];
    $return .= "<div class='list_pref'>".$name."<input type='submit' value='".$id."'></div></br>";
  }
  return $return;;
}

/*
** geopos vulnerable for sql injection
*/

function add_event($idp, $date, $geopos, $descr, $icon)
{
  check_logged();
  $uid = get_uid();
  $time = date("Y-m-d H:i:s", time());
  if ($idp == 0)
  {
      if (!$res = DB::query(" INSERT INTO `events` (`id`, `idp`, `date`, `geopos`, `icon`, `description`, `cr_id`)
                              VALUES (NULL, 0, 0, '".$time."', '".$geopos."', '".DB::esc($icon)."', '".DB::esc($descr)."', ".$uid.");"))
      {
        throw new Exception("DATABASE ERROE IN edit_prefr");
      }
      if ($res == True)
      {
        return "Added event!";
      }
  }
  else
  {
    if (!$res = DB::query("SELECT `description`,`geopos` FROM `preferences` WHERE `idu` LIKE '"
                            . $uid . "';"))
    {
      throw new Exception("DATABASE ERROR IN edit_pref");
    }
    if ($res->num_rows != 0)
    {
      throw new Exception("No such event!");
    }
    $arr = $res->fetch_assoc();
    $descr = $arr['description'];
    $geopos = $arr['geopos'];
    if (!$res = DB::query(" INSERT INTO `events` (`id`, `idp`, `date`, `geopos`, `icon`, `description`, `cr_id`)
                            VALUES (NULL, 0, 0, '".$time."', '".$geopos."', '".DB::esc($icon)."', '".DB::esc($descr)."', ".$uid.");"))
    {
      throw new Exception("DATABASE ERROE IN edit_prefr");
    }
    if ($res == True)
    {
      return "Added event!";
    }
  }
}

function edit_place_tags($value='')
{
}

function logout()
{
  header("Location: index.php");
  if (key_exists('login', $_SESSION))
    unset($_SESSION['login']);
  return "logged out";
}

 ?>
