<?
session_start ();
include 'top.php' ?>
<div id="container">
  <h1>RegEx</h1>
  <p>
    <?
    $pattern = '#^([0-9]{2})/([0-9]{2})/([0-9]{4})$#';
    $string  = '23/03/1965';
    echo '<h2>' . ( preg_replace ( $pattern, '$3-$2-$1', $string ) ) . '</h2>';

    ?>
  </p>
</div>
<? include 'bottom.php' ?>
