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

function get_uid()
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

function edit_profile($name, $surname, $bd, $gender, $number)
{
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

function edit_preference($action, $pref_name)
{
}

function add_place($name, $desc, $geopos, $site, $rank)
{
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
