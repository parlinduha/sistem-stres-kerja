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
                                        <th scope="col">ID Diagnosa</th>
                                        <th scope="col">Hasil Diagnosa</th>
                                        <th scope="col">Data Gejala</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($diagnosis as $item)
                                        <tr>
                                            <td scope="row">{{ $no++ }}</td>
                                            <td>{{ $item->diagnosis_id }}</td>
                                            <td>{{ $item->data_diagnosis }}</td>
                                            <td>{{ $item->condition }}</td>
                                            <td>
                                                <button data-id="{{ $item->id }}"
                                                    class="btn btn-sm btn-danger detailButton">Detail</button>
                                            </td>
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
    <script>
        $(document).ready(function() {
            // Ambil nilai token CSRF
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $('#dataTable').DataTable({
                "pageLength": 10
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
                        $('#hasilDiagnosa').val(response.data_diagnosis);
                        $('#dataGejala').val(response.condition);
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
