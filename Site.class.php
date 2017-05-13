<?php
require_once 'DB.class.php';
/**
 *
 */
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
    throw new Exception("DATABASE ERROR IN register");
  }
  if ($res->num_rows != 0)
  {
    throw new Exception("User alredy exists");
  }

  if (!$res = DB::query(" INSERT INTO `users` (`id`, `login`, `pass`)
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

public static function get_uid()
{
  if (!key_exists('login', $_SESSION) || !isset($_SESSION['login']))
    throw new Exception("You are not logged");
  if (!$res = DB::query("SELECT `id` FROM `users` WHERE `login` LIKE BINARY '"
                          . DB::esc($_SESSION['login']) . "';"))
  {
    throw new Exception("DATABASE ERROR IN get_uid");
  }
  if ($res->num_rows != 0)
  {
    throw new Exception("User not found!");
  }
  return ($res->fetch_assoc()['id']);
}

public static function edit_profile($name, $surname, $bd, $gender, $number)
{
  $uid = self::get_uid();
  if (!$res = DB::query("UPDATE `id` FROM `users` WHERE `login` LIKE BINARY '"
                          . DB::esc($_SESSION['login']) . "';"))
  {
    throw new Exception("DATABASE ERROR IN get_uid");
  }
}

public static function edit_preference($action, $pref_name)
{
}

public static function add_place($name, $desc, $geopos, $site, $rank)
{
}

public static function edit_place_tags($value='')
{
}

public static function logout()
{
  header("Location: index.php");
  if (key_exists('login', $_SESSION))
    unset($_SESSION['login']);
  return "logged out";
}

 ?>
