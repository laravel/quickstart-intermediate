@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-16">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Experiment Data
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                    <table class="table table-stripped table-hover text-nowrap">
                        <thead>
                            <tr>
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
                        <tbody>
                        @foreach ($edInfos as $edInfo)
                            <tr>
                                <td class="table-text"><div>{{ $edInfo->ed_id }}</div></td>
                                <td class="table-text"><div>{{ $edInfo->pmt_id }}</div></td>
                                <td class="table-text"><div>{{ $edInfo->operator }}</div></td>
                                <td class="table-text"><div>{{ $edInfo->test_time }}</div></td>
                                <td class="table-text"><div>{{ $edInfo->raw_data_path }}</div></td>
                                <td class="table-text"><div>{{ $edInfo->test_ambient_path }}</div></td>
                                <td class="table-text"><div>{{ $edInfo->detection_efficiency }}</div></td>
                                <td class="table-text"><div>{{ $edInfo->detail_detection_efficiency_path }}</div></td>
                                <td class="table-text"><div>{{ $edInfo->system_resolution }}</div></td>
                                <td class="table-text"><div>{{ $edInfo->ed_tts }}</div></td>
                                <td class="table-text"><div>{{ $edInfo->energy_resolution }}</div></td>
                                <td class="table-text"><div>{{ $edInfo->relative_energy_resolution }}</div></td>
                                <td class="table-text"><div>{{ $edInfo->single_muon_charge }}</div></td>
                                <td class="table-text"><div>{{ $edInfo->test_result_info_path_1 }}</div></td>
                                <td class="table-text"><div>{{ $edInfo->test_result_info_path_2 }}</div></td>
                                <td class="table-text"><div>{{ $edInfo->test_result_info_path_3 }}</div></td>
                                <td class="table-text"><div>{{ $edInfo->test_result_info_path_4 }}</div></td>
                                <td class="table-text"><div>{{ $edInfo->test_result_info_path_5 }}</div></td>
                                <td class="table-text"><div>{{ $edInfo->test_result_pdf_path }}</div></td>
                                <td class="table-text"><div>{{ $edInfo->figure_1_path }}</div></td>
                                <td class="table-text"><div>{{ $edInfo->figure_2_path }}</div></td>
                                <td class="table-text"><div>{{ $edInfo->figure_3_path }}</div></td>
                                <td class="table-text"><div>{{ $edInfo->figure_4_path }}</div></td>
                                <td class="table-text"><div>{{ $edInfo->figure_5_path }}</div></td>
                                <td class="table-text"><div>{{ $edInfo->figure_6_path }}</div></td>
                                <td class="table-text"><div>{{ $edInfo->figure_7_path }}</div></td>
                                <td class="table-text"><div>{{ $edInfo->figure_8_path }}</div></td>
                                <td class="table-text"><div>{{ $edInfo->figure_9_path }}</div></td>
                                <td class="table-text"><div>{{ $edInfo->figure_10_path }}</div></td>
                                <td class="table-text"><div>{{ $edInfo->figure_11_path }}</div></td>
                                <td class="table-text"><div>{{ $edInfo->figure_12_path }}</div></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
