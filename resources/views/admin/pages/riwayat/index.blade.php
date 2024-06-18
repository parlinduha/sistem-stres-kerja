@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Riwayat Diagnosa</h4>
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">User</th>
                                        <th scope="col">ID Diagnosa</th>
                                        <th scope="col">Hasil Diagnosa</th>
                                        <th scope="col">Diagnosa</th>
                                        {{-- <th scope="col">Aksi</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($diagnosis as $item)
                                        <tr>
                                            <td scope="row">{{ $no++ }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->diagnosis_id }}</td>
                                            <td>{{ $item->result_value }} atau {{ round($item->result_value * 100, 2) }} %
                                            </td>
                                            <td> {{ $item->result_code_sickness }}
                                                {{ $item->result_name_sickness }} </td>
                                            {{-- <td>
                                                <button data-id="{{ $item->id }}"
                                                    class="btn btn-sm btn-danger detailButton">Detail</button>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detail Riwayat -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Riwayat Diagnosa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="diagnosisId">ID Diagnosa:</label>
                        <input type="text" class="form-control" id="diagnosisId" readonly>
                    </div>
                    <div class="form-group">
                        <label for="hasilDiagnosa">Hasil Diagnosa:</label>
                        <input type="text" class="form-control" id="hasilDiagnosa" readonly>
                    </div>
                    <div class="form-group">
                        <label for="dataDiagnosis">Data Diagnosis:</label>
                        <textarea class="form-control" id="dataDiagnosis" rows="3" readonly></textarea>
                    </div>
                    <div class="form-group">
                        <label for="dataGejala">Data Gejala:</label>
                        <textarea class="form-control" id="dataGejala" rows="3" readonly></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

    <!-- DataTables JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            // Ambil nilai token CSRF
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $('#dataTable').DataTable({
                "pageLength": 10,
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'pdfHtml5',
                    title: 'Riwayat Diagnosa',
                    exportOptions: {
                        columns: ':visible'
                    }
                }]
            });
            // Setel header X-CSRF-Token untuk setiap permintaan AJAX
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': csrfToken
                }
            });
            $('.detailButton').click(function() {
                var id = $(this).data('id');
                $.ajax({
                    url: '/admin/riwayat/' + id,
                    type: 'GET',
                    success: function(response) {
                        $('#diagnosisId').val(response.diagnosis_id);
                        $('#hasilDiagnosa').val(response.result_value);

                        // Parse data diagnosis
                        var dataDiagnosis = JSON.parse(response.data_diagnosis);
                        var formattedDataDiagnosis = '';
                        dataDiagnosis.forEach(function(item) {
                            formattedDataDiagnosis += 'Value: ' + item.value +
                                ', Code Sickness: ' + item.code_sickness + '\n';
                        });
                        $('#dataDiagnosis').val(formattedDataDiagnosis);

                        // Parse data gejala
                        var dataGejala = JSON.parse(response.condition);
                        var formattedDataGejala = '';
                        dataGejala.forEach(function(item) {
                            formattedDataGejala += 'Gejala: ' + item[0] + ', Bobot: ' +
                                item[1] + '\n';
                        });
                        $('#dataGejala').val(formattedDataGejala);

                        $('#detailModal').modal('show');
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });


        });
    </script>
@endsection
