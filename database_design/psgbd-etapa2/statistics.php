<?php
require('autoload.php');

$pageTitle = "Statistics";
require('Parts/header.php');
?>


<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>

<!--
<div id="desiredProductsChart" style="width: 80%; height:400px;"></div>
<div id="undesiredProductsChart" style="width: 80%; height:400px;"></div>
<div id="desiredPreferencesChart" style="width: 80%; height:400px;"></div>
<div id="undesiredPreferencesChart" style="width: 80%; height:400px;"></div>
<div id="categoryChart" style="width: 80%; height:400px;"></div>
<div id="companyChart" style="width: 80%; height:400px;"></div>
<div id="similarPreferencesChart" style="width: 80%; height:400px;"></div>
<div id="maxPreferencesChart" style="width: 80%; height:400px;"></div>
<div id="minPreferencesChart" style="width: 80%; height:400px;"></div>
-->

<div class="container">
  <?php
      $dataPointsLine = array(
        array("y" => 35, "name" => "Black color"),
        array("y" => 20, "name" => "3.5Ghz processor"),
        array("y" => 18, "name" => "165cm diagonal"),
        array("y" => 10, "name" => "Chilli taste"),
        array("y" => 5, "name" => "15A Battery"),
        array("y" => 7, "name" => "Windows OS"),
        array("y" => 5, "name" => "Linux OS")
      );
  ?>
  <div id="chartContainerLine"></div>
    <script type="text/javascript">
        $(function () {
            var chart2 = new CanvasJS.Chart("chartContainerLine",
            {
                theme: "theme4",
                title:{
                    text: "Most wanted caracteristics"
                },
                animationEnabled: true,
                data: [
                {
                    type: "line",
                    showInLegend: true,
                    toolTipContent: "{name}: <strong>{y}%</strong>",
                    indexLabel: "{name} {y}%",
                    dataPoints: <?php echo json_encode($dataPointsLine, JSON_NUMERIC_CHECK); ?>
                }]
              });
              chart2.render();
          });
      </script>
  </div>


<div class="container">
  <?php
      $dataPointsPie = array(
        array("y" => 25, "name" => "Macbook Air"),
        array("y" => 28, "name" => "Asus Zenbook"),
        array("y" => 20, "name" => "Iphone 7"),
        array("y" => 8, "name" => "Samsung Galaxy S6"),
        array("y" => 7, "name" => "Toshiba notebook"),
        array("y" => 6, "name" => "Iphone 6S"),
        array("y" => 6, "name" => "Samsung UHD TV")
      );
  ?>
  <div id="chartContainerPie"></div>
    <script type="text/javascript">
        $(function () {
            var chart1 = new CanvasJS.Chart("chartContainerPie",
            {
                theme: "theme4",
                title:{
                    text: "Most wanted products"
                },
                animationEnabled: true,
                data: [
                {
                    type: "pie",
                    showInLegend: true,
                    toolTipContent: "{name}: <strong>{y}%</strong>",
                    indexLabel: "{name} {y}%",
                    dataPoints: <?php echo json_encode($dataPointsPie, JSON_NUMERIC_CHECK); ?>
                }]
              });
              chart1.render();
              chart1 = {};
          });
      </script>
  </div>
<br><br>


<?php require('Parts/footer.php'); ?>
