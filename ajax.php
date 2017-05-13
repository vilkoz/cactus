<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once 'DB.class.php';
require_once 'Site.class.php';
require_once 'Chat.class.php';
session_start();

try
{
  DB::init();

  $resp = array();
  switch($_GET['action'])
  {
    case 'login':
      $resp = Site::login($_POST['login'], $_POST['pass']);
      break;
    case 'register':
      $resp = Site::register($_POST['login'], $_POST['pass']);
      break;
    case 'logout':
      $resp = Site::logout();
      break;
    case 'join':
      $resp = Site::joinGame($_POST['join']);
      break;
    case 'join':
      $resp = Site::joinGame($_POST['join']);
      break;
    case 'loadMsg':
      $resp = Chat::loadMsg();
      break;
    case 'sendMsg':
      $resp = Chat::sendMsg($_GET['text']);
      break;
    default:
      throw new Exception("Wrong action");
  }

  // echo json_encode($resp);
  echo ($resp);
}
catch (Exception $e)
{
  // die(json_encode(array('error' => $e->getMessage())));
  die($e->getMessage());
}

 ?>
