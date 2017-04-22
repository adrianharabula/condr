<?php
require('autoload.php');

$pageTitle = "Statistics";
require('Parts/header.php');
?>


<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>

<!-- Personalised chart....
<script type="text/javascript">
  $(function () {
        var myData = new Array(['Jan', 2], ['Feb', 1], ['Mar', 3], ['Apr', 6], ['May', 8], ['Jun', 10], ['Jul', 9], ['Aug', 8], ['Sep', 5], ['Oct', 6], ['Nov', 2], ['Dec', 4]);
        var colors = ['#FFCC00', '#FFFF00', '#CCFF00', '#99FF00', '#33FF00', '#00FF66', '#00FF99', '#00FFCC', '#FF0000', '#FF3300', '#FF6600', '#FF9900'];
        var myChart = new JSChart('chartid', 'pie');

        myChart.setDataArray(myData);
      	myChart.colorizePie(colors);
      	myChart.setPiePosition(308, 170);
      	myChart.setPieRadius(95);
      	myChart.setPieUnitsFontSize(8);
      	myChart.setPieUnitsColor('#474747');
      	myChart.setPieValuesColor('#474747');
      	myChart.setPieValuesOffset(-10);
      	myChart.setTitleColor('#fff');
      	myChart.setSize(616, 321);
      	myChart.setBackgroundImage('path/background.jpg');
        myChart.draw();
    });
</script>
-->



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

-->

<div class="container">
  <?php
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
                    dataPoints: <?php  echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
                }]
            });
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
                      dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
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



            var chart2 = new CanvasJS.Chart("chartContainerLine",
<div id="similarPreferencesChart" style="width: 80%; height:400px;"></div>
<?php require('Parts/footer.php'); ?>
