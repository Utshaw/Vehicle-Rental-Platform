<?php
require_once '../../controller/admin/statistics_controller.php';
require_once './header.php';
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<h1 style="color: black;">Total Revenue : <?php echo $results4[0]->TOTAL_REVENUE ?></h1>
<h1 style="color: black;">Total Revenue this month : <?php echo $results5[0]->REVENUE_THIS_MONTH ?></h1>

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

        var dashboard3 = new google.visualization.Dashboard(
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

        var programmaticSlider3 = new google.visualization.ControlWrapper({
            'controlType': 'NumberRangeFilter',
            'containerId': 'programmatic_control_div3',
            'options': {
                'filterColumnLabel': 'Income',
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
                'legend': '',
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
                'legend': '',
                'chartArea': {
                    'left': 15,
                    'top': 15,
                    'right': 0,
                    'bottom': 0
                },
                'pieSliceText': 'value'
            }
        });

        var programmaticChart3 = new google.visualization.ChartWrapper({
            'chartType': 'ColumnChart',
            'containerId': 'programmatic_chart_div3',
            'options': {
                'width': 300,
                'height': 300,
                'legend': '',
                'chartArea': {
                    'left': 50,
                    'top': 15,
                    'right': 0,
                    'bottom': 50
                },
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
        var data3 = google.visualization.arrayToDataTable([
            ['Company', 'Income'],
            <?php foreach ($results3 as $income) :
                $str =  "['" . $income->COMPANY_NAME . "', " . $income->TOTAL_INCOME . "],";
                echo $str;
            endforeach;
            ?>

        ]);

        dashboard1.bind(programmaticSlider1, programmaticChart1);
        dashboard1.draw(data1);

        dashboard2.bind(programmaticSlider2, programmaticChart2);
        dashboard2.draw(data2);

        dashboard3.bind(programmaticSlider3, programmaticChart3);
        dashboard3.draw(data3);


    }
</script>




<div id="programmatic_dashboard_div" style="border: 1px solid #ccc">
    <table class="columns">
        <h1 style="color: black;"> Company wise Available Vehicles</h1>

        <tr>

            <td>
                <div id="programmatic_control_div1" style="padding-left: 2em; min-width: 250px"></div>
                
            </td>

            <td>
                <div id="programmatic_chart_div1"></div>
            </td>

        </tr>



    </table class="columns">


</div>

<div id="programmatic_dashboard_div" style="border: 1px solid #ccc">
    <table class="columns">

        <h1 style="color: black;"> Company wise Vehicles Rented </h1>

        <tr>

            <td>
                <div id="programmatic_control_div2" style="padding-left: 2em; min-width: 250px"></div>
                
            </td>

            <td>
                <div id="programmatic_chart_div2"></div>
            </td>

        </tr>

    </table>
</div>

<div id="programmatic_dashboard_div" style="border: 1px solid #ccc">
    <table class="columns">

        <h1 style="color: black;"> Company wise Revenue </h1>

        <tr>

            <td>
                <div id="programmatic_control_div3" style="padding-left: 2em; min-width: 250px"></div>
                
            </td>

            <td>
                <div id="programmatic_chart_div3"></div>
            </td>

        </tr>

    </table>
</div>

</body>

</html>