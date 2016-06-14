<? include 'top.php' ?>
<div id="container"><h1>Projet Web</h1>
  <?
  $bdd     = new PDO( 'mysql:host=localhost;dbname=tuto_projetweb', 'root', '', [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" ] );
  $requete = $bdd->prepare ( '

SELECT * FROM taches_etapes ORDER BY ordre

' );
  $requete->execute ();
  ?>
  <table>
    <?
    while ( $d = $requete->fetch () ) {
      ?>
      <tr>
        <td><?= $d['id'] ?></td>
        <td><?= $d['intitule'] ?></td>
        <td><?= $d['phase'] ?></td>
        <td><?= $d['executant'] ?></td>
        <td><?= $d['ordre'] ?></td>
      </tr>
      <?
    }
    ?>
  </table>
  <?
  // Remplissage de la table
  //    echo $tache . ' <br />';
  // $requete = $bdd->prepare ( 'INSERT INTO `taches_etapes`(`intitule`) VALUES (?)' );
  //    $requete->execute ( [ $tache ] );

  ?>
</div>
<? include 'bottom.php' ?>
