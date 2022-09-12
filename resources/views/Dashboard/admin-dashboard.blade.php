<x-layout.layout>

    <div class="row">
        <div class="col-sm-3">

            <div class="tile-stats tile-red">
                <div class="icon"><i class="entypo-gauge"></i></div>
                <div class="num">{{$T_Student}}</div>

                <h3>Registered Students</h3>

            </div>

        </div>
        <div class="col-sm-3">

            <div class="tile-stats tile-blue">
                <div class="icon"><i class="entypo-gauge"></i></div>
                <div class="num">{{$T_Employee}}</div>

                <h3>Registered Employee</h3>

            </div>

        </div>
        <div class="col-sm-3">

            <div class="tile-stats tile-cyan">
                <div class="icon"><i class="entypo-gauge"></i></div>
                <div class="num">{{$Total}}</div>

                <h3>Total Fee Collection</h3>

            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div id="piechart" style="width: 100%; height: 400px;"></div>
        </div>
        <div class="col-lg-6">
            <div id="top_x_div" style="width: 100%; height: 400px;"></div>
        </div>
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var S_count = <?= $S_count ?>;
            var result = [];
            result.push(['Task', 'Hours per Day']);
            S_count.forEach(element => {
                result.push([element['class_name'], element['students'].length]);
            });

            var data = google.visualization.arrayToDataTable(result);

            var options = {
                colors: ['#1e90ff', '#a1caf1', '#0096FF', '#89CFF0', '#f6c7b6'],
                title: 'Statistics'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript">
        var Fee_Sum = <?= $Fee_Sum ?>;
        var Fee_result = [];
        Fee_result.push(['Month', 'Fee collection']);
        Fee_Sum.forEach(element => {
            console.log(element);
            Fee_result.push([element['fee_month'], parseInt(element['fee_sum'])]);
        });
        console.log((Fee_result));
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
            var data = new google.visualization.arrayToDataTable(Fee_result);

            var options = {
                colors: ['#1e90ff', '#a1caf1', '#0096FF', '#f3b49f', '#f6c7b6'],

                title: 'Chess opening moves',
                // width: 400,
                legend: {
                    position: 'none'
                },
                // chart: { title: 'Chess opening moves',
                //          },
                bars: 'vertical', // Required for Material Bar Charts.
                axes: {
                    x: {
                        0: {
                            side: 'buttom',
                            label: 'Month'
                        } // Top x-axis.
                    }
                },
                bar: {
                    groupWidth: "10%"
                }
            };

            var chart = new google.charts.Bar(document.getElementById('top_x_div'));
            chart.draw(data, options);
        };
    </script>
</x-layout.layout>
