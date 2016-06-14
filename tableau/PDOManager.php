<?php

class PDOManager {

  private $host     = 'localhost';
  private $dbname   = 'tuto_projetweb';
  private $dbuser   = 'root';
  private $userpass = '';
  private $con;

  function __construct () {

    $this->driver = 'mysql';
    $con_string   = $this->driver . ":host=" . $this->host . ";dbname=" . $this->dbname;
    try {
      $this->con = new PDO( $con_string, $this->dbuser, $this->userpass, [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" ] );
    }
    catch ( PDOException $e ) {
      echo $e->getMessage ();
    }
  }

  public function modifyDB ( $array = [ "operation" => "", "table_names" => [ ], "columns" => [ ], "where" => "1=1", "params" => [ ] ] ) {

    $query = "";
    $vars  = "";
    switch ( strtoupper ( $array['operation'] ) ) {
      case 'INSERT':
        $query = "INSERT INTO ";
        $keys  = "";
        foreach ( $array["columns"] as $key => $value ) {
          $keys .= $key . ",";
          $vars .= ":" . $key . ",";
        }

        $keys        = substr ( $keys, 0, strlen ( $keys ) - 1 );
        $vars        = substr ( $vars, 0, strlen ( $vars ) - 1 );
        $table_names = "";
        foreach ( $array["table_names"] as $value ) {
          $table_names .= $value . ",";
        }
        $table_names = substr ( $table_names, 0, strlen ( $table_names ) - 1 );

        $query .= " $table_names ($keys) VALUES ($vars)";
        $prepare = $this->con->prepare ( $query );

        return $prepare->execute ( $array["columns"] );
        break;
      case 'SELECT':
        $query = $array["operation"];
        foreach ( $array["columns"] as $value ) {
          $vars .= $value . ",";
        }
        $vars        = substr ( $vars, 0, strlen ( $vars ) - 1 );
        $table_names = "";
        foreach ( $array["table_names"] as $value ) {
          $table_names .= $value . ",";
        }
        $table_names = substr ( $table_names, 0, strlen ( $table_names ) - 1 );
        $where       = $array['where'];
        $query .= " $vars FROM $table_names WHERE $where";
        $prepare = $this->con->prepare ( $query );
        $prepare->execute ( $array["params"] );

        // echo $query;
        return $prepare->fetchAll ( PDO::FETCH_ASSOC );
        break;
      case 'UPDATE':
        $query = "UPDATE ";
        foreach ( $array["columns"] as $key => $value ) {
          $vars .= $key . "=:" . $key . ",";
        }

        $vars        = substr ( $vars, 0, strlen ( $vars ) - 1 );
        $table_names = "";
        foreach ( $array["table_names"] as $value ) {
          $table_names .= $value . ",";
        }
        $table_names = substr ( $table_names, 0, strlen ( $table_names ) - 1 );
        $where       = $array['where'];
        $query .= "$table_names SET $vars WHERE $where";
        $prepare     = $this->con->prepare ( $query );
        $globalArray = [ ];
        foreach ( $array["columns"] as $key => $value ) {
          $globalArray[ $key ] = $value;
        }
        foreach ( $array["params"] as $key => $value ) {
          $globalArray[ $key ] = $value;
        }

        return $prepare->execute ( $globalArray );
        break;
      case 'DELETE':
        $query = "DELETE ";

        $table_names = "";
        foreach ( $array["table_names"] as $value ) {
          $table_names .= $value . ",";
        }
        $table_names = substr ( $table_names, 0, strlen ( $table_names ) - 1 );
        $where       = $array['where'];
        $query .= "FROM $table_names WHERE $where";
        $prepare = $this->con->prepare ( $query );

        return $prepare->execute ( $array["params"] );
        break;
      default:
        throw new Exception( "Unknown Operation", 0 );
        break;
    }

  }

  public function query ( $queryString, $params = [ ] ) {

    $data    = [ "success" => false, "data" => null ];
    $prepare = $this->con->prepare ( $queryString );
    if ( $prepare->execute ( $params ) ) {
      $data = $prepare->fetchAll ( PDO::FETCH_ASSOC );
    }

    return $data;
  }

  public function queryp ( $sql ) {

    $data    = [ "success" => false, "data" => null ];
    $prepare = $this->con->prepare ( $sql );
    $prepare->execute ();
  }
}

?>
