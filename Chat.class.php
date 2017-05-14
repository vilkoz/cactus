<?php
/**
 *
 */
require_once 'Site.class.php';
require_once 'DB.class.php';
class Chat extends Site
{
  function __construct()
  {
  }

  public static function sendMsg($text)
  {
    if (!key_exists('login', $_SESSION) || !isset($_SESSION['login']))
      throw new Exception("You are not logged");
    if (!$res = DB::query("SELECT `uid` FROM `users` WHERE `login` LIKE BINARY '".DB::esc($_SESSION['login'])."'" ))
      throw new Exception("DATABASE ERROE IN sendMsg1".(DB::getMysqliInstance()->error));
    $your_uid = $res->fetch_assoc()['uid'];
    if (!$res = DB::query(
      "INSERT INTO `messages` (`mid`, `gid`, `uid`, `time`, `text`) VALUES (NULL, '"
      .(($_SESSION['gid'] == NULL) ? "-1" : $_SESSION['gid'])
      ."', '".DB::esc($your_uid)."', CURRENT_TIMESTAMP, '".DB::esc($text)."');"
      ))
      throw new Exception("DATABASE ERROE IN sendMsg2".(DB::getMysqliInstance()->error));
  }

  public static function loadMsg()
  {
    if (!key_exists('login', $_SESSION) || !isset($_SESSION['login']))
      throw new Exception("You are not logged");

    if (!$res = DB::query(
      "SELECT `messages`.`gid`, `users`.`login`, `messages`.`time`, `messages`.`text` FROM `messages` INNER JOIN `users` ON `messages`.`uid` = `users`.`uid`"
      ."WHERE `gid` = "
      .(($_SESSION['gid'] == NULL) ? "-1" : $_SESSION['gid'])." ORDER BY `messages`.`time`;"
    ))
      throw new Exception("DATABASE ERROE IN loadMsg1".(DB::getMysqliInstance()->error));
    $rows = array();
    while ($row = $res->fetch_assoc())
      $rows[] = $row;

    $res = "";
    foreach ($rows as $row) {
      $res .= "<div class='time'>[".$row['time']."]</div><div class='usr'><b>".$row['login']."</b></div><div class='msg'> "
      .$row['text']."</div><div style='clear:both'></div>";
    }
    return $res;
  }
}

 ?>
