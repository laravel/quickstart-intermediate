@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-16">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Experiment Data
                </div>

                <div class="panel-body">
                    <table id="ed-infos" class="table table-striped text-nowrap">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Id</th>
                                <th>Ed id</th>
                                <th>Pmt id</th>
                                <th>Operator</th>
                                <th>Test time</th>
                                <th>Raw data path</th>
                                <th>Test ambient path</th>
                                <th>Detection Efficiency</th>
                                <th>Detail detection efficiency path</th>
                                <th>System resolution</th>
                                <th>Ed tts</th>
                                <th>Energy resolution</th>
                                <th>Relative energy resolution</th>
                                <th>Single muon charge</th>
                                <th>Test result info path 1</th>
                                <th>Test result info path 2</th>
                                <th>Test result info path 3</th>
                                <th>Test result info path 4</th>
                                <th>Test result info path 5</th>
                                <th>Test result pdf path</th>
                                <th>Figure 1 path</th>
                                <th>Figure 2 path</th>
                                <th>Figure 3 path</th>
                                <th>Figure 4 path</th>
                                <th>Figure 5 path</th>
                                <th>Figure 6 path</th>
                                <th>Figure 7 path</th>
                                <th>Figure 8 path</th>
                                <th>Figure 9 path</th>
                                <th>Figure 10 path</th>
                                <th>Figure 11 path</th>
                                <th>Figure 12 path</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            
            <div class="panel panel-default">
                <form action="{!! route('EdInfos.excel') !!}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="dataFile">
                    <input type="submit">
                </form>
            </div>
        </div>

        <div class="modal fade" id="chart" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Chart</h4>
                    </div>
                    <div class="modal-body">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div id="histogram"/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop

@push('datatable-scripts')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="/vendor/datatables/datatables.bootstrap.css">
    <script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.5/handlebars.min.js"></script>


    <script>
        $(function() {
            var footer = document.createElement("tfoot");
            $(footer).append(document.createElement("tr"));
            $('#ed-infos thead th').each(function(){
               $(this).append(document.createElement('th'))
            }.bind($(footer.firstElementChild)));
            $('#ed-infos').append(footer);

            var index = 0;

            var template = Handlebars.compile($("#details-template").html());
            var table = $('#ed-infos').DataTable({
                processing: true,
                serverSide: true,
                order: [],
                ajax: '{!! route('EdInfos.latest') !!}',
                columns: [
                    {
                        "className":      'history-control',
                        "orderable":      false,
                        "searchable":      false,
                        "data":           null,
                        "defaultContent": ''
                    },
                    { "data" : "id" },
                    { "data" : "ed_id"},
                    { "data" : "pmt_id" },
                    { "data" : "operator" },
                    { "data" : "test_time" },
                    { "data" : "raw_data_path" },
                    { "data" : "test_ambient_path" },
                    { "data" : "detection_efficiency" },
                    { "data" : "detail_detection_efficiency_path" },
                    { "data" : "system_resolution" },
                    { "data" : "ed_tts" },
                    { "data" : "energy_resolution" },
                    { "data" : "relative_energy_resolution" },
                    { "data" : "single_muon_charge" },
                    { "data" : "test_result_info_path_1" },
                    { "data" : "test_result_info_path_2" },
                    { "data" : "test_result_info_path_3" },
                    { "data" : "test_result_info_path_4" },
                    { "data" : "test_result_info_path_5" },
                    { "data" : "test_result_pdf_path" },
                    { "data" : "figure_1_path" },
                    { "data" : "figure_2_path" },
                    { "data" : "figure_3_path" },
                    { "data" : "figure_4_path" },
                    { "data" : "figure_5_path" },
                    { "data" : "figure_6_path" },
                    { "data" : "figure_7_path" },
                    { "data" : "figure_8_path" },
                    { "data" : "figure_9_path" },
                    { "data" : "figure_10_path" },
                    { "data" : "figure_11_path" },
                    { "data" : "figure_12_path" }
                ],
                initComplete: function () {
                    this.api().columns().every(function () {
                        if(index == 0){
                            index++;
                            return;
                        }

                        var column = this;
                        var input = document.createElement("input");
                        $(input).appendTo($(column.footer()).empty())
                                .on('change', function () {
                                    column.search($(this).val(), false, false, true).draw();
                                });
                        $(input).wrap("<div></div>");

                        var btn = document.createElement("button");
                        btn.setAttribute("type", "button");
                        btn.setAttribute("class", "btn btn-xs btn-primary");
                        btn.setAttribute("data-toggle", "modal");
                        btn.setAttribute("data-target", "#chart");
                        btn.setAttribute("data-label", column.dataSrc());
                        btn.setAttribute("data-index", index++);
                        btn.innerHTML = "Generate chart";
                        $(btn).appendTo($(column.footer()));
                        $(btn).wrap("<div></div>");
                        btn.onclick = drawChart;
                        btn.disabled = true;
                    });

                    this.wrap("<div id='responsive-container' class='table-responsive'></div>");
                }
            });

            // Add event listener for opening and closing details
            $('#ed-infos tbody').on('click', 'td.history-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row(tr);
                var tableId = 'history-' + row.data().ed_id;

                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    // Open this row
                    row.child(template(row.data())).show();
                    initTable(tableId, row.data());
                    tr.addClass('shown');
                    tr.next().find('td').addClass('no-padding bg-gray');
                }
            });

            function initTable(tableId, data) {
                $('#' + tableId).DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: data.history_url,
                    columns: [
                        { "data" : "id" },
                        { "data" : "pmt_id" },
                        { "data" : "operator" },
                        { "data" : "test_time" },
                        { "data" : "raw_data_path" },
                        { "data" : "test_ambient_path" },
                        { "data" : "detection_efficiency" },
                        { "data" : "detail_detection_efficiency_path" },
                        { "data" : "system_resolution" },
                        { "data" : "ed_tts" },
                        { "data" : "energy_resolution" },
                        { "data" : "relative_energy_resolution" },
                        { "data" : "single_muon_charge" },
                        { "data" : "test_result_info_path_1" },
                        { "data" : "test_result_info_path_2" },
                        { "data" : "test_result_info_path_3" },
                        { "data" : "test_result_info_path_4" },
                        { "data" : "test_result_info_path_5" },
                        { "data" : "test_result_pdf_path" },
                        { "data" : "figure_1_path" },
                        { "data" : "figure_2_path" },
                        { "data" : "figure_3_path" },
                        { "data" : "figure_4_path" },
                        { "data" : "figure_5_path" },
                        { "data" : "figure_6_path" },
                        { "data" : "figure_7_path" },
                        { "data" : "figure_8_path" },
                        { "data" : "figure_9_path" },
                        { "data" : "figure_10_path" },
                        { "data" : "figure_11_path" },
                        { "data" : "figure_12_path" }
                    ],
                    initComplete: function(){
                        /**
                         *  This is for better display, the constant 20 is set corresponding to padding defined.
                         **/
                        this.parent().width($('#responsive-container').width() - 20);
                        this.wrap("<div class='table-responsive'></div>");
                    }
                })
            }
        });
    </script>

    <script id="details-template" type="text/x-handlebars-template">
        <div class="label label-info">Ed @{{ ed_id }}'s History Data</div>
        <table class="table details-table" id="history-@{{ ed_id }}">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Pmt id</th>
                    <th>Operator</th>
                    <th>Test time</th>
                    <th>Raw data path</th>
                    <th>Test ambient path</th>
                    <th>Detection Efficiency</th>
                    <th>Detail detection efficiency path</th>
                    <th>System resolution</th>
                    <th>Ed tts</th>
                    <th>Energy resolution</th>
                    <th>Relative energy resolution</th>
                    <th>Single muon charge</th>
                    <th>Test result info path 1</th>
                    <th>Test result info path 2</th>
                    <th>Test result info path 3</th>
                    <th>Test result info path 4</th>
                    <th>Test result info path 5</th>
                    <th>Test result pdf path</th>
                    <th>Figure 1 path</th>
                    <th>Figure 2 path</th>
                    <th>Figure 3 path</th>
                    <th>Figure 4 path</th>
                    <th>Figure 5 path</th>
                    <th>Figure 6 path</th>
                    <th>Figure 7 path</th>
                    <th>Figure 8 path</th>
                    <th>Figure 9 path</th>
                    <th>Figure 10 path</th>
                    <th>Figure 11 path</th>
                    <th>Figure 12 path</th>
                </tr>
            </thead>
        </table>
    </script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart']});
        google.charts.setOnLoadCallback(enableGenerate);
        
        function enableGenerate() {
            $('button').each(function () {
                this.disabled = false;
            })
        }

        function drawChart() {
            var rawData = [['id', $('thead th')[this.getAttribute('data-index')].innerHTML]];
            var records = $('#ed-infos').DataTable().data();
            for(var i = 0; i < records.length; i++){
                rawData.push(['Record ' + records[i]['id'], records[i][this.getAttribute('data-label')]]);
            }
            var data = new google.visualization.arrayToDataTable(rawData);

            var options = {
                'width' : 500,
                'legend' : {
                    'position' : 'top'
                }
            };

            var chart = new google.visualization.Histogram(document.getElementById('histogram'));

            chart.draw(data, options);
        }
    </script>


    <style>
        table.dataTable tfoot th {
            padding: 8px 8px 8px 8px;
        }
        table.dataTable tfoot th input{
            width: 100%;
        }
        table.dataTable tfoot th button{
            margin-top: 8px;
            width: 100%;
        }
        .table-responsive{
            width: 100%;
        }
        svg{
            width: 100%;
        }
    </style>
@endpush