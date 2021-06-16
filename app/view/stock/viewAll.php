
<!-- ----- début viewAll -->
<?php

require ($root . '/app/view/fragment/fragmentCovidHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCovidMenu.html';
      include $root . '/app/view/fragment/fragmentCovidJumbotron.html';
      
      $cols = $results[0];
      $datas = $results[1];
  
      ?>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <?php
                foreach ($cols as $attribut){
                    echo "<th scope = \"col\">$attribut</th>";
                }
          ?>
        </tr>
      </thead>
      <tbody>
          <?php
          foreach ($datas as $element) {
            echo "<tr>";
                foreach ($element as $value){
                    echo "<td>$value</td>";
                }
            echo "</tr>";
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  