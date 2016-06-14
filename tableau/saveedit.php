<?php
require_once ( "PDOManager.php" );
$db     = new PDOManager();
$result = $db->queryp ( "UPDATE php_interview_questions set " . $_POST["column"] . " = '" . $_POST["editval"] . "' WHERE  id=" . $_POST["id"] );
?>
