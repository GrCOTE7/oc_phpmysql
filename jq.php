<?
session_start ();
include 'top.php' ?>

<div id="container">
  <h1>Jq</h1>

  <div id="macase">
    <p id="p1">P1</p>
    <p id="p2">P2</p>
  </div>

  <p class="parag">Paragraphe 1</p>
  <p class="parag">Paragraphe 2</p>
  <p class="parag">Paragraphe 3</p>

  <div id="example-section30">
    <div id="div301" style="display:none">Tiger</div>
    <div id="div302">Goat</div>
    <br style="clear:both"/>
    <button id="btn303" type="button">toggle</button>
    &nbsp;
    <button id="btn304" type="button">toggle with animation</button>
  </div>
  <!--
    <table>

      <tr>
        <td>Cellule 1
        </td>

        <td>
          <div class="dscell dynopt">
            <span class="moncas">111</span>
            <select class="choix">
              <option>111</option>
              <option>222</option>
              <option>333</option>
            </select>
          </div>
        </td>

        <td>Cellule 3</td>
      </tr>

      <tr>
        <td class="dynopt">Cellule 1
        </td>

        <td>
          <div class="dscell dynopt">
            <span class="moncas">111</span>
            <select class="choix">
              <option>111</option>
              <option>222</option>
              <option>333</option>
            </select>
          </div>
        </td>

        <td>Cellule 3</td>
      </tr>

    </table>
    -->
  <? $scriptjs_perso =
    '<script src="js/gc7_001.js"></script>';
  include 'bottom.php' ?>
