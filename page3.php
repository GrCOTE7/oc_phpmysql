<?
session_start ();
include 'top.php' ?>
<div id="container">
  <h1>POO</h1>
  <p>
    <?

    include_once 'Membre.class.php';

    $lionel = new Membre( 'GrCOTE7' );

    echo $lionel->getPseudo () . '<br />';

    $lionel->setPseudo ( 'Nono' );

    echo $lionel->getPseudo ();
    ?>
  </p>
</div>
<? include 'bottom.php' ?>
