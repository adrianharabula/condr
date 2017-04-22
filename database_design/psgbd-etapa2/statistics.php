<?php
require('autoload.php');

$pageTitle = "Statistics";
require('Parts/header.php');
?>


<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>






<!-- Must do ...

<div id="desiredProductsChart" style="width: 80%; height:400px;"></div>
<div id="undesiredProductsChart" style="width: 80%; height:400px;"></div>
<div id="desiredPreferencesChart" style="width: 80%; height:400px;"></div>
<div id="undesiredPreferencesChart" style="width: 80%; height:400px;"></div>
<div id="categoryChart" style="width: 80%; height:400px;"></div>
<div id="companyChart" style="width: 80%; height:400px;"></div>
<div id="similarPreferencesChart" style="width: 80%; height:400px;"></div>
<div id="maxPreferencesChart" style="width: 80%; height:400px;"></div>
<div id="minPreferencesChart" style="width: 80%; height:400px;"></div>



<div class="container">
  <?php /*
      $dataPoints1 = array(
        array("y" => 35, "name" => "Black color"),
        array("y" => 20, "name" => "3.5Ghz processor"),
        array("y" => 18, "name" => "165cm diagonal"),
        array("y" => 10, "name" => "Chilli taste"),
        array("y" => 5, "name" => "15A Battery"),
        array("y" => 7, "name" => "Windows OS"),
        array("y" => 5, "name" => "Linux OS")
      );
  ?>
  <div id="chartContainerPie">
    <script type="text/javascript">
        $(function () {
            var chart1 = new CanvasJS.Chart("chartContainerPie",
            {
                theme: "theme4",
                title:{
                    text: "Most wanted caracteristics"
                },
                animationEnabled: true,
                data: [
                {
                    type: "pie",
                    showInLegend: true,
                    toolTipContent: "{name}: <strong>{y}%</strong>",
                    indexLabel: "{name} {y}%",
                    dataPoints: <?php  echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>,
                    backgroundColor: ["#FF6384","#36A2EB","#FFCE56","#FFCE56","#FFCE56","#FFCE56","#FFCE56","#FFCE56"]
                }]
            });
            // chart1.colorize();
            chart1.render();
        });
      </script>
    </div>


    <?php
        $dataPoints2 = array(
          array("y" => 25, "name" => "Macbook Air"),
          array("y" => 28, "name" => "Asus Zenbook"),
          array("y" => 20, "name" => "Iphone 7"),
          array("y" => 8, "name" => "Samsung Galaxy S6"),
          array("y" => 7, "name" => "Toshiba notebook"),
          array("y" => 6, "name" => "Iphone 6S"),
          array("y" => 6, "name" => "Samsung UHD TV")
        );
    ?>
    <div id="chartContainerLine">
      <script type="text/javascript">
          $(function () {
              var chart2 = new CanvasJS.Chart("chartContainerLine",
              {
                  theme: "theme4",
                  title:{
                      text: "Most wanted products"
                  },
                  animationEnabled: true,
                  data: [
                  {
                      type: "line",
                      showInLegend: true,
                      toolTipContent: "{name}: <strong>{y}%</strong>",
                      indexLabel: "{name} {y}%",
                      dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); */?>
                  }]
              });
              chart2.render();
          });
      </script>
   </div>
</div>


<div class="container">
  <p> I just wanna see if the browser prints this in a container.....But i guess not...</p>
</div>

<style>
#chartContainerPie
{
      margin-top: 30px;
}
#chartContainerLine
{
  margin-top:450px;
}
</style>
-->

<?php require('Parts/footer.php'); ?>
