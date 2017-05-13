<?php
/**
 *
 */
class DB
{
  public static $instance;
  public $mysqli;

  private function __construct()
  {
    $dbOptions = unserialize(file_get_contents('mysql.cfg'));
    $this->mysqli = new mysqli(
      $dbOptions['db_host'],
      $dbOptions['db_user'],
      $dbOptions['db_pass'],
      $dbOptions['db_name']);
      if (mysqli_connect_errno())
        throw new Exception("DATABASE ERROR");
      $this->mysqli->set_charset("utf8");
  }

  public static function init()
  {
    if (self::$instance instanceof self)
      return False;

    self::$instance = new self();
  }

  public static function getMysqliInstance()
  {
    return (self::$instance->mysqli);
  }

  public static function query($q)
  {
    return self::$instance->mysqli->query($q);
  }

  public static function esc($str)
  {
    return self::$instance->mysqli->real_escape_string(htmlspecialchars($str));
  }
}

 ?>
