<?php
require_once '../../controller/admin/statistics_controller.php';
require_once './header.php';
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart', 'controls']
    });
    google.charts.setOnLoadCallback(drawStuff);

    function drawStuff() {

        var dashboard1 = new google.visualization.Dashboard(
            document.getElementById('programmatic_dashboard_div'));
        var dashboard2 = new google.visualization.Dashboard(
            document.getElementById('programmatic_dashboard_div'));

        // We omit "var" so that programmaticSlider is visible to changeRange.
        var programmaticSlider1 = new google.visualization.ControlWrapper({
            'controlType': 'NumberRangeFilter',
            'containerId': 'programmatic_control_div1',
            'options': {
                'filterColumnLabel': 'Number of vehicles',
                'ui': {
                    'labelStacking': 'vertical'
                }
            }
        });

        var programmaticSlider2 = new google.visualization.ControlWrapper({
            'controlType': 'NumberRangeFilter',
            'containerId': 'programmatic_control_div2',
            'options': {
                'filterColumnLabel': 'Vehicles Sold',
                'ui': {
                    'labelStacking': 'vertical'
                }
            }
        });

        var programmaticChart1 = new google.visualization.ChartWrapper({
            'chartType': 'PieChart',
            'containerId': 'programmatic_chart_div1',
            'options': {
                'width': 300,
                'height': 300,
                'legend': 'none',
                'chartArea': {
                    'left': 15,
                    'top': 15,
                    'right': 0,
                    'bottom': 0
                },
                'pieSliceText': 'value'
            }
        });
        var programmaticChart2 = new google.visualization.ChartWrapper({
            'chartType': 'PieChart',
            'containerId': 'programmatic_chart_div2',
            'options': {
                'width': 300,
                'height': 300,
                'legend': 'none',
                'chartArea': {
                    'left': 15,
                    'top': 15,
                    'right': 0,
                    'bottom': 0
                },
                'pieSliceText': 'value'
            }
        });



        var data1 = google.visualization.arrayToDataTable([
            ['Company', 'Number of vehicles'],
            <?php foreach ($results1 as $company) :
                $str =  "['" . $company->COMPANY_NAME . "', " . $company->VEHICLE_COUNT . "],";
                echo $str;
            endforeach;
            ?>

        ]);

        var data2 = google.visualization.arrayToDataTable([
            ['Company', 'Vehicles Sold'],
            <?php foreach ($results2 as $vehicle_sold) :
                $str =  "['" . $vehicle_sold->COMPANY_NAME . "', " . $vehicle_sold->ORDER_COUNT . "],";
                echo $str;
            endforeach;
            ?>

        ]);


        dashboard1.bind(programmaticSlider1, programmaticChart1);
        dashboard1.draw(data1);
       
        dashboard2.bind(programmaticSlider2, programmaticChart2);
        dashboard2.draw(data2);


    }
</script>




<div id="programmatic_dashboard_div" style="border: 1px solid #ccc">
    <table class="columns">
        <h1 style="color: black;"> Company wise Available Vehicles</h1>

        <tr>

            <td>
                <div id="programmatic_control_div1" style="padding-left: 2em; min-width: 250px"></div>
                <div>
                    <button style="margin: 1em 1em 1em 2em" onclick="changeRange1();">
                        Select range [2, 5]
                    </button><br />
                    <button style="margin: 1em 1em 1em 2em" onclick="changeOptions1();">
                        Make the pie chart 3D
                    </button>
                </div>
                <script type="text/javascript">
                    function changeRange1() {
                        programmaticSlider1.setState({
                            'lowValue': 2,
                            'highValue': 5
                        });
                        programmaticSlider1.draw();
                    }

                    function changeOptions1() {
                        programmaticChart1.setOption('is3D', true);
                        programmaticChart1.draw();
                    }
                </script>
            </td>

            <td>
                <div id="programmatic_chart_div1"></div>
            </td>

        </tr>



    </table class="columns">


</div>

<div id="programmatic_dashboard_div" style="border: 1px solid #ccc">
    <table class="columns">

        <h1 style="color: black;"> Company wise Vehicles Sold</h1>

        <tr>

            <td>
                <div id="programmatic_control_div2" style="padding-left: 2em; min-width: 250px"></div>
                <div>
                    <button style="margin: 1em 1em 1em 2em" onclick="changeRange2();">
                        Select range [2, 5]
                    </button><br />
                    <button style="margin: 1em 1em 1em 2em" onclick="changeOptions2();">
                        Make the pie chart 3D
                    </button>
                </div>
                <script type="text/javascript">
                    function changeRange2() {
                        programmaticSlider2.setState({
                            'lowValue': 2,
                            'highValue': 5
                        });
                        programmaticSlider2.draw();
                    }

                    function changeOptions2() {
                        programmaticChart2.setOption('is3D', true);
                        programmaticChart2.draw();
                    }
                </script>
            </td>

            <td>
                <div id="programmatic_chart_div2"></div>
            </td>

        </tr>

    </table>
</div>

</body>

</html>