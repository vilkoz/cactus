<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once 'DB.class.php';
require_once 'Site.class.php';
// require_once 'Chat.class.php';
session_start();

try
{
  DB::init();

  $resp = array();
  switch($_GET['action'])
  {
    case 'login':
      $resp = login($_POST['login'], $_POST['pass']);
      break;
    case 'register':
      $resp = register($_POST['login'], $_POST['pass']);
      break;
    case 'logout':
      $resp = logout();
      break;
    case 'list_interests':
      $resp = list_interests();
      break;
    case 'add_preference':
      $resp = edit_preference("add", $_POST['idi']);
      break;
    case 'del_preference':
      $resp = edit_preference("del", $_POST['idi']);
      break;
    default:
      throw new Exception("Wrong action");
  }
  echo ($resp);
}
catch (Exception $e)
{
  // die(json_encode(array('error' => $e->getMessage())));
  die($e->getMessage());
}

 ?>
