        <footer class="main-footer">
        	<div class="pull-right hidden-xs">
        		<b>Version</b> 1.0.0
        	</div>
        	<strong>Copyright &copy; 2019 Eduan Villegas</strong> All rights
        	reserved.
        </footer>
        </div>
        <!-- ./wrapper -->
        <!-- jQuery 3 -->
        <script src="<?php echo base_url(); ?>assets/template/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/template/jquery-print/jquery.print.js"></script>
		<!-- ChartJS -->
		<script src="<?php echo base_url(); ?>assets/template/chart.js/Chart.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?php echo base_url(); ?>assets/template/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/template/jquery-ui/jquery-ui.js"></script>
        <!-- Select2 -->
        <script src="<?php echo base_url(); ?>assets/template/select2/dist/js/select2.full.min.js"></script>
        <!-- SlimScroll -->
        <script src="<?php echo base_url(); ?>assets/template/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- DataTables -->
        <script src="<?php echo base_url(); ?>assets/template/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/template/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <!-- DataTables Export -->
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.0/sl-1.2.3/datatables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/template/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/template/datatables/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/template/datatables/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/template/datatables/buttons.colVis.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/template/datatables/jszip.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/template/datatables/pdfmake.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/template/datatables/vfs_fonts.js"></script>

        <!--<script src="<?php echo base_url(); ?>assets/template/datatables-export/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/datatables-export/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/datatables-export/js/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/datatables-export/js/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/datatables-export/js/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/template/datatables-export/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/datatables-export/js/buttons.print.min.js"></script>-->
        <!-- FastClick -->
        <script src="<?php echo base_url(); ?>assets/template/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/template/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url(); ?>assets/template/dist/js/demo.js"></script>
        <script src="<?php echo base_url(); ?>assets/template/fullcalendar/lib/moment.min.js"></script>
        <!-- datepicker -->
        <script type="text/javascript" src="<?php echo base_url() . 'assets/template/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/template/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js"></script>
        <!-- bootstrap datepicker -->
        <script type="text/javascript" src="<?php echo base_url() . 'assets/template/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/template/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.es.js'; ?>"></script>
        <!-- bootstrap time picker -->
        <script src="<?php echo base_url() . 'assets/template/bootstrap-timepicker/bootstrap-timepicker.min.js'; ?>"></script>
        <!-- bootstrap time picker -->
        <script src="<?php echo base_url(); ?>assets/template/bootstrap-sweetalert/dist/sweetalert.js"></script>
        <!-- fullcalendar -->
        <script type="text/javascript" src="<?php echo base_url() . 'assets/template/fullcalendar/fullcalendar.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/template/fullcalendar/locale/es.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/template/fullcalendar/gcal.js'; ?>"></script>
        <!--<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>-->
        <!--<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/responsive/1.0.2/js/dataTables.responsive.js"></script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/a5734b29083/integration/bootstrap/3/dataTables.bootstrap.js"></script>-->
        <?php if (isset($script)) $this->load->view($script); ?>
        <script>
        	$(document).ready(function() {
        		var base_url = "<?php echo base_url(); ?>";
        		$(document).on("click", "#btn-print", function() {
        			$("#body1").print({
        				title: "Comprobante de Venta"
        			});
        		});
        		$('.select2').select2();
        		//Date picker
        		$('.datepicker').datepicker({
        			format: 'yyyy/mm/dd',
        			autoclose: true,
        			language: 'es',
        		})

        		//Timepicker
        		$('.timepicker').timepicker({
        			showInputs: false,
        		})

        		$('#example').DataTable({
        			language: {
        				"lengthMenu": "Mostrar _MENU_ registros por pagina",
        				"zeroRecords": "No se encontraron resultados en su busqueda",
        				"searchPlaceholder": "Buscar registros",
        				"info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
        				"infoEmpty": "No existen registros",
        				"infoFiltered": "(filtrado de un total de _MAX_ registros)",
        				"search": "Buscar:",
        				"paginate": {
        					"first": "Primero",
        					"last": "Último",
        					"next": "Siguiente",
        					"previous": "Anterior"
        				},

        			}
        		});

        		$('#example1').DataTable({
        			dom: 'Bfrtip',
        			buttons: [
        				'copyHtml5',
        				'excelHtml5',
        				'csvHtml5',
        				'pdfHtml5'
        			],
        			"responsive": true,
        			"language": {
        				"lengthMenu": "Mostrar _MENU_ registros por pagina",
        				"zeroRecords": "No se encontraron resultados en su busqueda",
        				"searchPlaceholder": "Buscar registros",
        				"info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
        				"infoEmpty": "No existen registros",
        				"infoFiltered": "(filtrado de un total de _MAX_ registros)",
        				"search": "Buscar:",
        				"paginate": {
        					"first": "Primero",
        					"last": "Último",
        					"next": "Siguiente",
        					"previous": "Anterior"
        				},
        			}
        		});
        		$('.sidebar-menu').tree();
        	})
        </script>
		<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas)

    var areaChartData = {
      labels  : ['Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
      datasets: [
        {
          label               : 'Electronics',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
        {
          label               : 'Digital Goods',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        }
      ]
    }

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions)

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
    var lineChart                = new Chart(lineChartCanvas)
    var lineChartOptions         = areaChartOptions
    lineChartOptions.datasetFill = false
    lineChart.Line(areaChartData, lineChartOptions)

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
      {
        value    : 700,
        color    : '#f56954',
        highlight: '#f56954',
        label    : 'Chrome'
      },
      {
        value    : 500,
        color    : '#00a65a',
        highlight: '#00a65a',
        label    : 'IE'
      },
      {
        value    : 400,
        color    : '#f39c12',
        highlight: '#f39c12',
        label    : 'FireFox'
      },
      {
        value    : 600,
        color    : '#00c0ef',
        highlight: '#00c0ef',
        label    : 'Safari'
      },
      {
        value    : 300,
        color    : '#3c8dbc',
        highlight: '#3c8dbc',
        label    : 'Opera'
      },
      {
        value    : 100,
        color    : '#d2d6de',
        highlight: '#d2d6de',
        label    : 'Navigator'
      }
    ]
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChartData.datasets[1].fillColor   = '#00a65a'
    barChartData.datasets[1].strokeColor = '#00a65a'
    barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
  })
</script>
        </body>

        </html>
