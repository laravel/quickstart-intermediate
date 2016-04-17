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
        </div>
    </div>
@stop

@push('datatable-scripts')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>
    <script>
        $(function() {
            $('#ed-infos').DataTable({
                processing: true,
                serverSide: true,
                bAutoWidth: false,
                ajax: '{!! route('EdInfos.data') !!}',
                columns: [
                    { "data" : "id" },
                    { "data" : "ed_id" },
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
                ]
            });

            // Wrap the table with table-responsive!!!
            $('#ed-infos').wrap("<div class='table-responsive'></div>");
            $('.table-responsive').width("100%");
        });
    </script>
@endpush