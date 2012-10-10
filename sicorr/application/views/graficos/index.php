<h1 style="text-align:center;">Porcentaje Estado de las Correspondencias</h1>
<script type="text/javascript">
      var chart;
		var TITLE_GRAPHS='Porcentaje Estado de las Correspondencias';
      var chartData =[
                        { "item":"Nuevas"     ,"nuevas":"100"      },
                        { "item":"Pendientes" ,"pendientes":"200"  },
                        { "item":"Respondidas","enviadas":"150"    }
                     ];
			AmCharts.ready(function () {
               // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData;
                chart.categoryField = "item";
				    chart.startDuration = 1;

                // the following two lines makes chart 3D
                chart.depth3D = 20;
                chart.angle = 30;
                // AXES
                // Category
            var categoryAxis = chart.categoryAxis;
				    categoryAxis.labelRotation = 45;
                categoryAxis.gridPosition = "start";
                categoryAxis.gridAlpha = 0.1;
                categoryAxis.axisAlpha = 0;
                // Value
            var valueAxis = new AmCharts.ValueAxis();
                valueAxis.axisAlpha = 0;
                valueAxis.gridAlpha = 0.1;
                valueAxis.position = "top";
                chart.addValueAxis(valueAxis);

                // GRAPHS
                // first graph
            var graph1 = new AmCharts.AmGraph();
                graph1.type = "column";
                graph1.title = "Nuevas";
                graph1.valueField = "nuevas";
                graph1.balloonText = "Nuevas: [[value]]"+' Correspondencias.';
                graph1.lineAlpha = 0;
                graph1.fillColors = "#4F81BD";
                graph1.fillAlphas = 1;
                chart.addGraph(graph1);

                // second graph
            var graph2 = new AmCharts.AmGraph();
                graph2.type = "column";
                graph2.title = "Pendientes";
                graph2.valueField = "pendientes";
                graph2.balloonText = "Pendientes: [[value]]"+' Correspondencias.';
                graph2.lineAlpha = 0;
                graph2.fillColors = "#9BBB59";
                graph2.fillAlphas = 1;
                chart.addGraph(graph2);
				
				// second graph
            var graph3 = new AmCharts.AmGraph();
                graph3.type = "column";
                graph3.title = "Enviadas";
                graph3.valueField = "enviadas";
                graph3.balloonText = "Enviadas: [[value]]"+' Correspondencias.';
                graph3.lineAlpha = 0;
                graph3.fillColors = "#C0504D";
                graph3.fillAlphas = 1;
                chart.addGraph(graph3);

                // LEGEND
                var legend = new AmCharts.AmLegend();
                chart.addLegend(legend);

                // WRITE
                chart.write("chartdiv");
            });
</script>
<div id="chartdiv" style="width: 100%; height: 400px;"></div>
