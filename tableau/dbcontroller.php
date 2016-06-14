<?php

class DBController {

  private $host     = "localhost";
  private $user     = "root";
  private $password = "";
  private $database = "tuto_projetweb";

  function __construct () {

    $this['bdd'] = new PDO( 'mysql:host=localhost;dbname=tuto_projetweb', 'root', '', [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" ] );
  }

  function runQuery ( $query ) {

    $requete = $bdd->prepare ( '

SELECT * FROM taches_etapes ORDER BY ordre

' );
    $requete->execute ();

    $result = mysql_query ( $query );
    while ( $row = mysql_fetch_assoc ( $result ) ) {
      $resultset[] = $row;
    }
    if ( ! empty( $resultset ) ) {
      return $resultset;
    }
  }

  function numRows ( $query ) {

    $result   = mysql_query ( $query );
    $rowcount = mysql_num_rows ( $result );

    return $rowcount;
  }
}

?>
