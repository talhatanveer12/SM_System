<x-layout.layout>

    <div class="row">
        <div class="col-sm-3">
            <div class="tile-stats tile-red">
                <div class="icon"><i class="entypo-gauge"></i></div>
                <div class="num">{{ $T_Student }}</div>
                <h3>Total Registered Students</h3>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="tile-stats tile-blue">
                <div class="icon"><i class="entypo-gauge"></i></div>
                <div class="num">{{ $T_Employee }}</div>
                <h3>Total Registered Employee</h3>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="tile-stats tile-cyan">
                <div class="icon"><i class="entypo-gauge"></i></div>
                <div class="num">{{ $Total }}</div>
                <h3>Total Fee Collection for student</h3>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="tile-stats tile-green">
                <div class="icon"><i class="entypo-gauge"></i></div>
                <div class="num">{{ $month_fee->total_month_fee }}</div>
                <h3>This Month Fee collection</h3>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div id="piechart" style="width: 100%; height: 400px;"></div>
    </div>
    <div class="col-lg-6">
        <div id="top_x_div" style="width: 100%; height: 400px;"></div>
    </div>
    <hr />
    <br>
    <div class="col-lg-6">
        <div class="calendar-env">
            <div class="calendar-body " style="width: 100%;">
                <div id="calendar"></div>
            </div>
        </div>

    </div>
    <div class="col-sm-3 mt-6">

        {{-- <div class="tile-block" id="todo_tasks">

            <div class="tile-header">
                <i class="entypo-list"></i>

                <a href="#">
                    Tasks
                    <span>To do list, tick one.</span>
                </a>
            </div>

            <div class="tile-content">

                <input type="text" class="form-control" placeholder="Add Task" />


                <ul class="todo-list">
                    <li>
                        <div class="checkbox checkbox-replace color-white">
                            <input type="checkbox" />
                            <label>Student Add</label>
                        </div>
                    </li>

                    <li>
                        <div class="checkbox checkbox-replace color-white">
                            <input type="checkbox" id="task-2" checked />
                            <label>Today goal Complete</label>
                        </div>
                    </li>

                    <li>
                        <div class="checkbox checkbox-replace color-white">
                            <input type="checkbox" id="task-3" />
                            <label>Lunch</label>
                        </div>
                    </li>

                    <li>
                        <div class="checkbox checkbox-replace color-white">
                            <input type="checkbox" id="task-4" />
                            <label>Breakfast</label>
                        </div>
                    </li>

                </ul>

            </div>

            <div class="tile-footer">
                <a href="#">Just For Fun</a>
            </div>

        </div> --}}
    </div>
    <div class="col-sm-3">
    </div>


    <script src="assets/js/fullcalendar/fullcalendar.min.js"></script>
        <script src="assets/js/view-calendar.js"></script>

    <script type="text/javascript">
        // Code used to add Todo Tasks
        jQuery(document).ready(function($) {
            var $todo_tasks = $("#todo_tasks");

            $todo_tasks.find('input[type="text"]').on('keydown', function(ev) {
                if (ev.keyCode == 13) {
                    ev.preventDefault();

                    if ($.trim($(this).val()).length) {
                        var $todo_entry = $(
                            '<li><div class="checkbox checkbox-replace color-white"><input type="checkbox" /><label>' +
                            $(this).val() + '</label></div></li>');
                        $(this).val('');

                        $todo_entry.appendTo($todo_tasks.find('.todo-list'));
                        $todo_entry.hide().slideDown('fast');
                        replaceCheckboxes();
                    }
                }
            });
        });
    </script>

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
                //colors: ['#373e4a', '#1f2227', '#373e4a', '#89CFF0', '#f6c7b6'],
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
                //colors: ['#373e4a', '#1f2227', '#373e4a', '#f3b49f', '#f6c7b6'],

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
