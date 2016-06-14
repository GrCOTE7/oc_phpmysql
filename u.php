<? include 'top.php' ?>
<link rel="stylesheet" href="js/jquery-ui-1.11.4/jquery-ui.min.css"/>
<div id="projet">
  <header>
    <h1>Liste & Tableau Inline Editinig Blur</h1>
    <h1>HTML5 + CSS3 + LESS + Bootstrap + PHP/MySQL + jQ API + jQ-UI + AJAX</h1>
  </header>

  <h3 id="mytext">Cliquer sur le titre...</h3>
  <div id="main">


    <section id="blocliste">
      <h2>Liste</h2>

      <?php
      require_once ( "tableau/PDOManager.php" );
      $db  = new PDOManager();
      $sql = "SELECT * FROM sortable_liste_items WHERE owner='liste' ORDER BY uorder";
      $t   = $db->query ( $sql );
      ?>
      <ul id="liste">
        <?
        foreach ( $t as $item ) {
//          echo 'item' . $item['id'] . 'l';
          echo '<li class="ui-state-default" id="item' . $item['id'] . 'l"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>' . $item['name'] . '</li>';
        }
        ?>
      </ul>
    </section>

    <section id="tableau">
      <?php
      require_once ( "tableau/PDOManager.php" );
      $db  = new PDOManager();
      $sql = "SELECT * FROM sortable_liste_items WHERE owner='tableau' ORDER BY uorder";
      $t   = $db->query ( $sql );
      ?>

      <!--      <script src="tableau/jquery-1.10.2.js"></script>-->

      <table class="tbl-qa" id="tableau">

        <thead>
        <tr>
          <th colspan="3">Tableau</th>
        </tr>
        <tr>
          <th class="table-header" width="10%">Id</th>
          <th class="table-header">Name</th>
          <th class="table-header" style="text-align: center;">Ordre</th>
        </tr>
        </thead>

        <tbody>

        <?
        foreach ( $t as $d ) {
          ?>
          <tr class="table-row">

            <td><?= $d['id'] ?></td>
            <td><?= $d['name'] ?></td>
            <!--
        <td contenteditable="true"
        >

          <select
            onClick="showEdit(this)"
            class="phase"
            onchange="displayVal()"
            onBlur="saveToDatabase(this,'phase')"
          >
            <?
            //            echo $d['phase'];
            //        $poss = range ( 111, 555, 111 );
            //        foreach ( $poss as $p ) {
            //          $isSelected = ( $p == $d['phase'] ) ? ' selected' : '';
            //          echo '<option' . $isSelected . '>' . $p . '</option>';
            //        }
            ?>
          </select>
        </td>
        -->

            <td style="text-align: right; padding-right: 40px;"><?= $d['uorder'] ?></td>

          </tr>
          <?php
        }
        ?>
        </tbody>
        <!--
    contenteditable = "true"
    onBlur  = "saveToDatabase(this,'phase','<? //= $d["id"]; ?>')"
    onClick = "showEdit(this);" >
    -->
      </table>
    </section>

  </div>
</div>

<? $scriptjs_perso = '
  <script src="js/jquery-ui-1.11.4/jquery-ui.min.js"></script>
  <script src="js/u.js">
</script>';
include 'bottom.php' ?>
