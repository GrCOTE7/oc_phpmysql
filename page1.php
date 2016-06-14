<? include 'top.php' ?>
<div id="container"><h1>MySQL</h1>
  <p>
    <?

    $bdd = new PDO( 'mysql:host=localhost;dbname=tutophpmysql', 'root', '', [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ] );

    $requete = $bdd->prepare ( '

SELECT AVG(prix) AS moy FROM jeux_video

' );
    $requete->execute ();
    while ( $donnees = $requete->fetch () ) {
      echo $donnees['moy'] . ' €<br />';
    }

    // Juste pour syntaxe
    //    $requete = $bdd->prepare ( 'INSERT INTO jeux_video (nom, possesseur) VALUES (?,?)' );
    //    $requete->execute ( [ $_GET['nom'], $_GTE['possesseur'] ] );

    ?></p>
</div>
<? include 'bottom.php' ?>
