<?php 

include("scripts/conexao.php"); 
$consulta = "SELECT * FROM `Temperatura` ORDER BY `Temperatura`.`wea_id` DESC LIMIT 0, 5";
$result = $con->query($consulta) or die ($con->error);
$resulttempcor = $con->query($consulta) or die ($con->error);
$resulttempterm = $con->query($consulta) or die ($con->error);
$rowtempcor = $resulttempcor->fetch_array();
$tempcor = $rowtempcor['wea_temp'];

while ($rowtempterm = $resulttempcor->fetch_array()){
	$tempterm = $rowtempterm["wea_temp"];
}

?>

<html lang="en">
	<head>
 		<meta charset="UTF-8">
 		<meta content="IE=edge" http-equiv="X-UA-Compatible">
  		<meta content="width=device-width, initial-scale=1" name="viewport">
  		<title>Temperatura</title>
  		<link href="https://playground.anychart.com/docs/samples/GAUGE_Linear_03/iframe" rel="canonical">
  		<meta content="Gauges,Thermometer Gauge" name="keywords">
  		<meta content="AnyChart - JavaScript Charts designed to be embedded and integrated" name="description">
 		<link rel="stylesheet" type="text/css" href="style.css">
  		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  		<link href="css/anychart-ui.min.css" rel="stylesheet" type="text/css">

  		<script>
    		function atualizar() {
        		var temp5 = parseFloat(<?php echo $tempcor; ?>);

        		if (temp5 <= 20){
            		principal.style.background = "#0064FF";
        		}
        		else if (20 < temp5 && temp5 <= 22){
            		principal.style.background = "#0096FF";
        		}

        		else if (22 < temp5 && temp5 <= 24){
            		principal.style.background = "#00C8FF";
        		}

        		else if (24 < temp5 && temp5 <= 26){
            		principal.style.background = "#00FFFF";
        		}

       			else if (26 < temp5 && temp5 <= 28){
            		principal.style.background = "#FFFF00";
        		}

        		else if (28 < temp5 && temp5 <= 30){
           			principal.style.background = "#FFD700";
        		}

        		else if (30 < temp5 && temp5 <= 32){
            		principal.style.background = "#FFC800";
        		}

        		else if (32 < temp5 && temp5 <= 34){
            		principal.style.background = "#FF9600";
        		}

        		else if (34 < temp5 && temp5 <= 36){
            		principal.style.background = "#FF6400";
        		}
        		else{
            		principal.style.background = "#FF3200";
        		}
    		}    
		</script>
	</head>

	<body onload="javascript:atualizar();">
    	<main id="principal">
    		<header></header>

    		<section id = "secundaria">
          
				<div id="container"></div>
				<script src="scripts/anychart-base.min.js"></script>
				<script src="scripts/anychart-linear-gauge.min.js"></script>
				<script src="scripts/anychart-exports.min.js"></script>
				<script src="scripts/anychart-ui.min.js"></script>
				<script type="text/javascript">anychart.onDocumentReady(function () {
    
    				// create data
    				var term = [];
    				term[0] = <?php echo ((9/5)*($resulttempterm->fetch_array()["wea_temp"])+32);?>;
    				var data = term;
    
    				// set the gauge type
    				var gauge = anychart.gauges.thermometer();

    				// set the data for the gauge
    				gauge.data(data);

    				// set the title of the gauge
    				gauge.title('Termometro de Celsius e Fahrenheit');

    				// add a thermometer pointer
   		 			gauge.addPointer(0);

    				// use the primary scale a Fahrenheit scale
    				var fScale = gauge.scale();

    				// set the minimum and maximum values of the Fahrenheit scale
    				fScale.minimum(-40);
    				fScale.maximum(122);

   					// set the intervals of major and minor ticks on the Fahrenheit scale
    				fScale.ticks().interval(10);
    				fScale.minorTicks().interval(2);    

    				// add an axis on the left side of the gauge
    				var axisLeft = gauge.axis(0);

    				// configure minor ticks on the left axis
    				axisLeft.minorTicks(true)
    				axisLeft.minorTicks().stroke('#cecece');

    				// set the width of the left axis
    				axisLeft.width('0');

    				// set the offset of the left axis (as a percentage of the gauge width)
    				axisLeft.offset('-0.18%');

    				// bind the left axis to the Fahrenheit scale
   				 	axisLeft.scale(fScale);

    				// configure a Celsius scale
   			 		var cScale = anychart.scales.linear();
    				cScale.minimum(-40);
    				cScale.maximum(50);
    				cScale.ticks().interval(10);
    				cScale.minorTicks().interval(1);

   					// configure an axis on the right side of the gauge
    				var axisRight = gauge.axis(1);
    				axisRight.minorTicks(true);
    				axisRight.minorTicks().stroke('#cecece');
    				axisRight.width('0');
    				axisRight.offset('3.15%');
    				axisRight.orientation('right');

    				// bind the right axis to the Celsius scale
    				axisRight.scale(cScale);

    				// set the container id
    				gauge.container('container');

    				// initiate drawing the gauge
    				gauge.draw();

    			});</script>

          		<div id="temp"><center>
            		<table id = "table">
                    	<thead>
                        	<tr>
                            	<th>ID</th>
                            	<th>Data e Hora</th>
                            	<th>°C</th>
                            	<th>ºF</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php while($row = $result->fetch_array()){ ?>
                            <tr>
                            	<td><?php echo $row["wea_id"];?></td>
                            	<td><?php echo $row["wea_date"];?></td>
                            	<td><?php echo $row["wea_temp"];?></td>
                             	<td><?php echo ((9/5)*($row["wea_temp"]))+32;?></td> 
                            </tr>
                                <?php } ?>
                        </tbody>
                    </table>
          		</center></div>
        	</section>
    	</main>
	</body>
</html>
<?php mysql_close($con);?>