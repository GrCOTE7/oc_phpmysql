<?php
require_once ( "./PDOManager.php" );
$db  = new PDOManager();
$sql = "UPDATE taches_etapes set " . $_POST["column"] . " = '" . $_POST["editedval"] . "' WHERE  id=" . $_POST["id"];
//echo '<br /><br /><br /><br /><br />' . $sql;
$result = $db->queryp ( $sql );
?>
