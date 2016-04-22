<!-- BEGIN CORE PLUGINS -->   
<!--[if lt IE 9]>
<script src="assets/plugins/respond.min.js"></script>
<script src="assets/plugins/excanvas.min.js"></script> 
<![endif]-->
<?php echo $this->Minify->script('plugins/jquery-1.10.2.min');?>
<?php echo $this->Minify->script('plugins/jquery-migrate-1.2.1.min');?>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<?php echo $this->Minify->script('plugins/jquery-ui/jquery-ui-1.10.3.custom.min');?>
<?php echo $this->Minify->script('plugins/bootstrap/js/bootstrap.min');?>
<?php echo $this->Minify->script('plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min');?>
<?php echo $this->Minify->script('plugins/jquery-slimscroll/jquery.slimscroll.min');?>
<?php echo $this->Minify->script('plugins/jquery.blockui.min');?>
<?php echo $this->Minify->script('plugins/jquery.cookie.min');?>
<?php echo $this->Minify->script('plugins/uniform/jquery.uniform.min');?>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<?php echo $this->Minify->script('plugins/jqvmap/jqvmap/jquery.vmap');?>
<?php echo $this->Minify->script('plugins/jqvmap/jqvmap/maps/jquery.vmap.russia');?>
<?php echo $this->Minify->script('plugins/jqvmap/jqvmap/maps/jquery.vmap.world');?>
<?php echo $this->Minify->script('plugins/jqvmap/jqvmap/maps/jquery.vmap.europe');?>
<?php echo $this->Minify->script('plugins/jqvmap/jqvmap/maps/jquery.vmap.germany');?>
<?php echo $this->Minify->script('plugins/jqvmap/jqvmap/maps/jquery.vmap.usa');?>
<?php echo $this->Minify->script('plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata');?>
<?php echo $this->Minify->script('plugins/jquery.peity.min');?>
<?php echo $this->Minify->script('plugins/jquery.pulsate.min');?>
<?php echo $this->Minify->script('plugins/jquery-knob/js/jquery.knob');?>
<?php echo $this->Minify->script('plugins/flot/jquery.flot');?>
<?php echo $this->Minify->script('plugins/flot/jquery.flot.resize');?>
<?php echo $this->Minify->script('plugins/bootstrap-daterangepicker/moment.min');?>
<?php echo $this->Minify->script('plugins/bootstrap-daterangepicker/daterangepicker');?>
<?php echo $this->Minify->script('plugins/gritter/js/jquery.gritter');?>
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<?php echo $this->Minify->script('plugins/fullcalendar/fullcalendar/fullcalendar.min');?>
<?php echo $this->Minify->script('plugins/jquery-easy-pie-chart/jquery.easy-pie-chart');?>
<?php echo $this->Minify->script('plugins/jquery.sparkline.min');?>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<!-- END PAGE LEVEL SCRIPTS -->  
<!-- BEGIN PAGE LEVEL PLUGINS -->
<?php echo $this->Minify->script('plugins/flot/jquery.flot');?>
<?php echo $this->Minify->script('plugins/flot/jquery.flot.resize');?>
<?php echo $this->Minify->script('plugins/flot/jquery.flot.pie');?>
<?php echo $this->Minify->script('plugins/flot/jquery.flot.stack');?>
<?php echo $this->Minify->script('plugins/flot/jquery.flot.crosshair');?>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<?php echo $this->Minify->script('scripts/app');?>
<?php echo $this->Minify->script('scripts/index');?>
<?php echo $this->Minify->script('scripts/tasks');?>
<script>
   jQuery(document).ready(function() {    
      App.init(); // initlayout and core plugins
      Index.init();
      Index.initJQVMAP(); // init index page's custom scripts
      Index.initCalendar(); // init index page's custom scripts
      Index.initCharts(); // init index page's custom scripts
      Index.initChat();
      Index.initMiniCharts();
      Index.initPeityElements();
      Index.initKnowElements();
      Index.initDashboardDaterange();
      Tasks.initDashboardWidget();




                     var data = [
                                   {label:"Chemistry",data:10},
                                   {label:"Markting",data:15},
                                   {label:"Analytics",data:25},
                                   {label:"IT",data:35},
                                   {label:"Presenting",data:15},
                                        ];




         // DONUT
         $.plot($("#donut"), data, {
                 series: {
                     pie: {
                         innerRadius: 70,
                         show: true,
                     }
                 }
             });

             var data = [
                                   {label:"In Progress",data:15,color:"#979393"},
                                   {label:"No Activity",data:35,color:"#DF2A2A"},
                                   {label:"Completed",data:50,color:"#1A8107"},

                                        ];


                     // GRAPH 1
         $.plot($("#pie_chart_1"), data, {
                 series: {
                     pie: {
                         show: true
                     }
                 },
                 legend: {
                     show: false
                 }
             });
                     var data = [];
         var series = Math.floor(Math.random() * 10) + 1;
         series = series < 5 ? 5 : series;

         for (var i = 0; i < series; i++) {
             data[i] = {
                 label: "Series" + (i + 1),
                 data: Math.floor(Math.random() * 100) + 1
             }
         }


         //bars with controls

         function chart5() {
             var d1 = [];
             for (var i = 0; i <= 10; i += 1)
                 d1.push([i, parseInt(Math.random() * 30)]);

             var d2 = [];
             for (var i = 0; i <= 10; i += 1)
                 d2.push([i, parseInt(Math.random() * 30)]);

             var d3 = [];
             for (var i = 0; i <= 10; i += 1)
                 d3.push([i, parseInt(Math.random() * 30)]);

             var stack = 0,
                 bars = true,
                 lines = false,
                 steps = false;

             function plotWithOptions() {
                 $.plot($("#chart_5"), [d1, d2, d3], {
                         series: {
                             stack: stack,
                             lines: {
                                 show: lines,
                                 fill: true,
                                 steps: steps
                             },
                             bars: {
                                 show: bars,
                                 barWidth: 0.6
                             }
                         }
                     });
             }

             $(".stackControls input").click(function (e) {
                 e.preventDefault();
                 stack = $(this).val() == "With stacking" ? true : null;
                 plotWithOptions();
             });
             $(".graphControls input").click(function (e) {
                 e.preventDefault();
                 bars = $(this).val().indexOf("Bars") != -1;
                 lines = $(this).val().indexOf("Lines") != -1;
                 steps = $(this).val().indexOf("steps") != -1;
                 plotWithOptions();
             });

             plotWithOptions();
         }


         chart5();



       });
</script>