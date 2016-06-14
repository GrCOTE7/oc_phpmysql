<? include 'top.php' ?>
<link rel="stylesheet" href="js/jquery-ui-1.11.4/jquery-ui.min.css">
<div id="projet">
  <h1>Tableau Inline Editinig Blur</h1>
  <h1>Utilise HTML5 + CSS3 + LESS + Bootstrap + PHP/MySQL + jQ API + jQ-UI</h1>

  <ul id="sortable">
    <li class="ui-state-default" id="item1"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 1</li>
    <li class="ui-state-default" id="item2"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 2</li>
    <li class="ui-state-default" id="item3"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 3</li>
    <li class="ui-state-default" id="item4"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 4</li>
    <li class="ui-state-default" id="item5"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 5</li>
    <li class="ui-state-default" id="item6"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 6</li>
    <li class="ui-state-default" id="item7"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 7</li>
  </ul>

  <?php
  require_once ( "tableau/PDOManager.php" );
  $db  = new PDOManager();
  $sql = 'SELECT * from sortable_liste_items ORDER BY uorder';
  $t   = $db->query ( $sql );
  ?>
  <style>
    body {
      background-color : cornsilk;
      /*width            : 610px;*/
    }

    .current-row {
      background-color : #B24926;
      color            : #FFF;
    }

    .current-col {
      background-color : #1b1b1b;
      color            : #FFF;
    }

    .tbl-qa {
      width     : 100%;
      font-size : 0.9em;
      /*background-color : #f5f5f5;*/
    }

    .tbl-qa th.table-header {
      text-align : left;
      padding    : 0 10px 10px 10px;
    }

    .tbl-qa .table-row td {
      padding          : 5px 10px;
      background-color : #FDFDFD;

    }
  </style>
  <!--      <script src="tableau/jquery-1.10.2.js"></script>-->

  <script>
    function displayVal() {
      var singleValue = $("#phase" + this.id).val();
      console.log('Nouvelle valeur = ' + singleValue);
    }
    function showEdit(editableObj) {
      $(editableObj).css("background", "#0F0");
    }

    function saveToDatabase(editableObj, column, id) {
      $(editableObj).css("background", "#FFA500 url(tableau/loaderIcon.gif) no-repeat right");
      var myselect = $("#phaseid option:selected").text();
      console.log('Selected value = ' + myselect);
      $.ajax({
        url: "tableau/saved.php",
        type: "POST",
        data: 'column=' + column + '&editedval=' + myselect + '&id=' + id,
        success: function (data) {
//              console.log(data);
          $(editableObj).css("background", "#FDFDFD");
        }
      })
      ;
    }
  </script>

  <table class="tbl-qa">
    <!--
    <thead>
    <tr>
      <th class="table-header" width="10%">Id</th>
      <th class="table-header">Intitulé</th>
      <th class="table-header">Phase</th>
      <th class="table-header">Éxecutant</th>
      <th class="table-header" style="text-align: center;">Ordre</th>
    </tr>
    </thead>
    -->
    <tbody>

    <?
    foreach ( $t as $d ) {
      ?>
      <tr class="table-row">

        <td><?= $d['id'] ?></td>

        <td><?= $d['intitule'] ?></td>

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
            $poss = range ( 111, 555, 111 );
            foreach ( $poss as $p ) {
              $isSelected = ( $p == $d['phase'] ) ? ' selected' : '';
              echo '<option' . $isSelected . '>' . $p . '</option>';
            }
            ?>
          </select>

        <td><?= $d['executant'] ?></td>

        <td style="text-align: right; padding-right: 40px;"><?= $d['ordre'] ?></td>

      </tr>
      <?php
    }
    ?>
    </tbody>
    <!--
    contenteditable = "true"
    onBlur  = "saveToDatabase(this,'phase','<?= $d["id"]; ?>')"
    onClick = "showEdit(this);" >
    -->
  </table>
  </body>
  </html>

</div>
<? $scriptjs_perso = '
  <script src="js/jquery-ui-1.11.4/jquery-ui.min.js"></script>
  <script src="js/u.js">
</script>';
include 'bottom.php' ?>
