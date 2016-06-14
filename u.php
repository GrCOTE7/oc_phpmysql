<? include 'top.php';
require_once ( "tableau/PDOManager.php" );
$db     = new PDOManager();
$sql    = "SELECT demo_photo.id, demo_photo.name FROM demo_photo ORDER BY demo_photo.position LIMIT 5";
$photos = $db->query ( $sql );
?>
<link rel="stylesheet" href="js/jquery-ui-1.11.4/jquery-ui.min.css"/>
<h1>Photos N.-Y.</h1>
<section id="photoDnD">
  <ul id="list-photos">
    <?
    foreach ( $photos as $photo ) {
      ?>
      <li id="photo_<?= $photo['id'] ?>">
        <img src="imgs/<?= $photo['name'] ?>" alt="Photos NY - Arnaud - k" width=" 80px" height="80px"/>
      </li>
      <?php
    }
    ?>
  </ul>
</section>
<? $scriptjs_perso = '
  <script src="js/jquery-ui-1.11.4/jquery-ui.min.js"></script>
  <script src="js/u.js">
</script>';
include 'bottom.php' ?>
