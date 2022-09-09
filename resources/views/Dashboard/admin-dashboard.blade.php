<x-layout.bootstrap-layout>
    <div class="col">
        <div class="row">
            <div class="col-span-12 flex-col ">
                <div class=" flex flex-wrap ">
                    <div class="px-6 py-4 m-4 bg-blue-200 w-64 rounded-2xl shadow-md hover:shadow-2xl ">
                        <span><b>Total Students</b></span>
                        <div class="flex justify-between items-center text-4xl my-2">
                            <span>{{ $T_Student }}</span>
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="flex justify-between items-center mb-2">
                            {{-- <span>Student</span> --}}
                            {{-- <span class="text-sm">Left 40</span> --}}
                        </div>
                    </div>
                    <div class="px-6 py-4 m-4 bg-blue-200 w-64 rounded-2xl shadow-md hover:shadow-2xl ">
                        <span><b>Total Employees</b></span>
                        <div class="flex justify-between items-center text-4xl my-2">
                            <span>{{ $T_Employee }}</span>
                            <i class="fa-sharp fa-solid fa-briefcase"></i>
                        </div>
                        <div class="flex justify-between items-center mb-2">
                            {{-- <span>Student</span> --}}
                            {{-- <span class="text-sm">Left 40</span> --}}
                        </div>
                    </div>
                    <div class="px-6 py-4 m-4 bg-blue-200 w-64 rounded-2xl shadow-md hover:shadow-2xl ">
                        <span><b>Total Fee Collection</b></span>
                        <div class="flex justify-between items-center text-4xl my-2">
                            <span>{{ $Total }}</span>
                            <i class="fa-solid fa-money-bill"></i>
                        </div>
                        <div class="flex justify-between items-center mb-2">
                            {{-- <span>Student</span> --}}
                            {{-- <span class="text-sm">Left 40</span> --}}
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

                {{-- <table class="columns">
                    <tr>
                      <td></td>
                      <td><div id="Anthony_chart_div" style="border: 1px solid #ccc"></div></td>
                    </tr>
                  </table> --}}
            </div>
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
                result.push([element['class_name'],element['students'].length]);
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
            Fee_result.push([element['fee_month'],parseInt(element['fee_sum'])]);
        });
        console.log((Fee_result));
        google.charts.load('current', {'packages':['bar']});
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
</x-layout.bootstrap-layout>
