<?php
require('autoload.php');

$pageTitle = "Statistics";
require('Parts/header.php');
?>


<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>
<link href="/Assets/css/statistics.css" rel="stylesheet">


<div class="col-md-7 col-md-offset-3">

  <!-- First chart -->
  <?php
      $dataPoints1 = array(
        array("y" => 14, "name" => "Macbook Air"),
        array("y" => 13, "name" => "Toshiba notebook"),
        array("y" => 12, "name" => "Rowenta hairdrier"),
        array("y" => 11, "name" => "Asus Zenbook"),
        array("y" => 9, "name" => "Iphone 6S"),
        array("y" => 8, "name" => "Samsung Galaxy 6S"),
        array("y" => 8, "name" => "Samsung UHD TV"),
        array("y" => 7, "name" => "Gilette Razor Machine"),
        array("y" => 8, "name" => "Chanel Mademoiselle"),
        array("y" => 3, "name" => "Dior Miss Cherry"),
        array("y" => 4, "name" => "Rowenta Silk-e-pil"),
        array("y" => 2, "name" => "Pancake machine"),
        array("y" => 1, "name" => "Douglas Rimmel")
      );
  ?>
  <div id="desiredProductsChart" style="width: 80%; height:400px;"></div>
  <script type="text/javascript">
      $(function () {
          var chart1 = new CanvasJS.Chart("desiredProductsChart",
          {
              theme: "theme4",
              title:{
                  text: "Most searched products"
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


  <!-- Second chart  -->
  <?php
      $dataPoints1 = array(
        array("y" => 14, "name" => "Motorola S304"),
        array("y" => 10, "name" => "Sea salt"),
        array("y" => 13, "name" => "Brown sugar"),
        array("y" => 10, "name" => "Brazilian nuts"),
        array("y" => 12, "name" => "Pistacchios"),
        array("y" => 11, "name" => "Oat biscuits"),
        array("y" => 9, "name" => "Cheese"),
        array("y" => 8, "name" => "Steel spoon"),
        array("y" => 9, "name" => "Radio alarm"),
        array("y" => 5, "name" => "SF Comic Books")
      );
  ?>
  <div id="undesiredProductsChart" style="width: 80%; height:400px;"></div>
  <script type="text/javascript">
    $(function () {
        var chart1 = new CanvasJS.Chart("undesiredProductsChart",
        {
            theme: "theme4",
            title:{
                text: "Most not searched products"
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


  <!-- Third chart.... -->
  <?php
      $dataPoints1 = array(
        array("y" => 14, "name" => "Charging time <1h"),
        array("y" => 12, "name" => "3.5Ghz processor"),
        array("y" => 10, "name" => "165cm diagonal"),
        array("y" => 8, "name" => "Chilli taste"),
        array("y" => 8, "name" => "15A Battery"),
        array("y" => 9, "name" => "Windows OS"),
        array("y" => 8, "name" => "Linux OS"),
        array("y" => 7, "name" => "Sweet smell"),
        array("y" => 7, "name" => "Black color"),
        array("y" => 5, "name" => "Autonomy 5h"),
        array("y" => 7, "name" => "Raspberry taste"),
        array("y" => 5, "name" => "Watermelon taste")
      );
  ?>
  <div id="desiredPreferencesChart" style="width: 80%; height:400px;"></div>
  <script type="text/javascript">
      $(function () {
          var chart1 = new CanvasJS.Chart("desiredPreferencesChart",
          {
              theme: "theme4",
              title:{
                  text: "Most wanted preferences"
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

    <!-- Fourth chart -->
    <?php
        $dataPoints1 = array(
          array("y" => 13, "name" => "Allergy nuts"),
          array("y" => 12, "name" => "Charging time >1h"),
          array("y" => 12, "name" => "Battery life <2h"),
          array("y" => 10, "name" => "Allergy nuts"),
          array("y" => 13, "name" => "Allergy gluten"),
          array("y" => 9, "name" => "Pink color"),
          array("y" => 8, "name" => "Power <100W"),
          array("y" => 9, "name" => "Taste sour"),
          array("y" => 9, "name" => "Display 9'"),
          array("y" => 5, "name" => "Temperature high"),
        );
    ?>
    <div id="undesiredPreferencesChart" style="width: 80%; height:400px;"></div>
    <script type="text/javascript">
        $(function () {
            var chart1 = new CanvasJS.Chart("undesiredPreferencesChart",
            {
                theme: "theme4",
                title:{
                    text: "Most unwanted preferences"
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


      <!-- Fifth chart -->
      <?php
          $dataPoints1 = array(
            array("y" => 13, "name" => "elisa47"),
            array("y" => 15, "name" => "Elena"),
            array("y" => 14, "name" => "Madalina"),
            array("y" => 13, "name" => "Adrian"),
            array("y" => 14, "name" => "HiMyNameIs0"),
            array("y" => 10, "name" => "Adina34"),
            array("y" => 7, "name" => "noNameUser03"),
            array("y" => 8, "name" => "Claudiu22"),
            array("y" => 6, "name" => "Martian123")
          );
      ?>
      <div id="maxPreferencesChart" style="width: 80%; height:400px;"></div>
      <script type="text/javascript">
          $(function () {
              var chart1 = new CanvasJS.Chart("maxPreferencesChart",
              {
                  theme: "theme4",
                  title:{
                      text: "Users with maximum preferences"
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


      <!-- Sixth chart  -->
      <?php
          $dataPoints1 = array(
            array("y" => 17, "name" => "iNeedABreak"),
            array("y" => 15, "name" => "filip.baciu"),
            array("y" => 14, "name" => "mishu96"),
            array("y" => 12, "name" => "Coco"),
            array("y" => 10, "name" => "BrazilianGuy"),
            array("y" => 8, "name" => "Ema56"),
            array("y" => 6, "name" => "AmericaLover1"),
            array("y" => 8, "name" => "Cici34"),
            array("y" => 9, "name" => "GeorgeDumitru")
          );
      ?>
      <div id="minPreferencesChart" style="width: 80%; height:400px;"></div>
      <script type="text/javascript">
          $(function () {
              var chart1 = new CanvasJS.Chart("minPreferencesChart",
              {
                  theme: "theme4",
                  title:{
                      text: "Users with minimum preferences"
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


        <!-- Seventh chart -->
        <?php
            $dataPoints1 = array(
              array("y" => 18, "name" => "Clothes"),
              array("y" => 17, "name" => "Electronics"),
              array("y" => 16, "name" => "Books"),
              array("y" => 15, "name" => "Footwear"),
              array("y" => 13, "name" => "Services"),
              array("y" => 11, "name" => "Education"),
              array("y" => 10, "name" => "Other")
            );
        ?>
        <div id="categoryChart" style="width: 80%; height:400px;"></div>
        <script type="text/javascript">
            $(function () {
                var chart1 = new CanvasJS.Chart("categoryChart",
                {
                    theme: "theme4",
                    title:{
                        text: "Products distribution by category"
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


        <!-- Eight chart -->
        <?php
            $dataPoints1 = array(
              array("y" => 11, "name" => "Apple"),
              array("y" => 10, "name" => "Toshiba"),
              array("y" => 10, "name" => "Rowenta"),
              array("y" => 9, "name" => "Asus"),
              array("y" => 9, "name" => "Samsung"),
              array("y" => 8, "name" => "Amazon"),
              array("y" => 8, "name" => "Altex"),
              array("y" => 7, "name" => "Centric"),
              array("y" => 8, "name" => "Asos"),
              array("y" => 6, "name" => "Flanco"),
              array("y" => 6, "name" => "Tommy Hilfiger"),
              array("y" => 4, "name" => "Lacoste"),
              array("y" => 3, "name" => "Douglas")
            );
        ?>
        <div id="companyChart" style="width: 80%; height:400px;"></div>
        <script type="text/javascript">
            $(function () {
                var chart1 = new CanvasJS.Chart("companyChart",
                {
                    theme: "theme4",
                    title:{
                        text: "Most relevant companies"
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


        <!-- Ninth chart -->
        <?php
            $dataPoints1 = array(
              array("y" => 13, "name" => "MichaelJackson"),
              array("y" => 12, "name" => "Dude123"),
              array("y" => 11, "name" => "Kiddo96"),
              array("y" => 10, "name" => "Zen78"),
              array("y" => 10, "name" => "Apple333"),
              array("y" => 8, "name" => "Galaxystar"),
              array("y" => 8, "name" => "SmartGuy5"),
              array("y" => 7, "name" => "Razors45"),
              array("y" => 8, "name" => "Mademoiselle90"),
              array("y" => 3, "name" => "cherryBomb56"),
              array("y" => 4, "name" => "toughLife"),
              array("y" => 2, "name" => "theLady"),
              array("y" => 1, "name" => "NoOne1998")
            );
        ?>
        <div id="similarPreferencesChart" style="width: 80%; height:400px;"></div>
        <script type="text/javascript">
            $(function () {
                var chart1 = new CanvasJS.Chart("similarPreferencesChart",
                {
                    theme: "theme4",
                    title:{
                        text: "Users with similar preferences"
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

<?php require('Parts/footer.php'); ?>
