@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" id="formTitle">Create Data</h4>
                        <form id="sicknessForm" class="forms-sample" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="code_sickness" class="col-sm-3 col-form-label">Kode</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="code_sickness"
                                        id="code_sickness" placeholder="Kode Gejala">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name_sickness" class="col-sm-3 col-form-label">Penyakit</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="name_sickness"
                                        id="name_sickness" placeholder="Penyakit">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-3 col-form-label">Solusi</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control form-control-sm" name="description" id="description" placeholder="Solusi"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary mr-2" id="submitButton">Submit</button>
                            <button class="btn btn-sm btn-danger" id="cancelButton">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Penyakit</h4>
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Penyakit</th>
                                        <th scope="col">Solusi</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($sickness as $sick)
                                        <tr>
                                            <td scope="row">{{ $no++ }}</td>
                                            <td>{{ $sick->code_sickness }}</td>
                                            <td>{{ $sick->name_sickness }}</td>
                                            <td>{{ $sick->description }}</td>
                                            <td>
                                                <button data-id="{{ $sick->id }}"
                                                    class="btn btn-sm btn-warning editButton">Edit</button>
                                                <button data-id="{{ $sick->id }}"
                                                    class="btn btn-sm btn-danger deleteButton">Delete</button>
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
            $('.editButton').click(function() {
                var id = $(this).data('id');
                $.ajax({
                    url: '/admin/sickness/' + id,
                    type: 'GET',
                    success: function(response) {
                        $('#code_sickness').val(response.code_sickness);
                        $('#name_sickness').val(response.name_sickness);
                        $('#description').val(response.description);
                        $('#formTitle').text('Update Data');
                        $('#submitButton').text('Update');
                        // Simpan ID penyakit dalam atribut data pada formulir
                        $('#sicknessForm').attr('data-id', id);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });

            $('#cancelButton').click(function(event) {
                event.preventDefault();
                $('#sicknessForm').trigger('reset');
                $('#formTitle').text('Create Data');
                $('#submitButton').text('Submit');
                // Hapus atribut data-id saat membatalkan
                $('#sicknessForm').removeAttr('data-id');
            });

            $('#sicknessForm').submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                // Dapatkan ID penyakit dari atribut data pada formulir
                var id = $(this).data('id');
                var url = $('#formTitle').text() === 'Create Data' ? '/admin/sickness/store' :
                    '/admin/sickness/update/' + id;
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        // Handle success response
                        console.log(response);
                        alert('Data successfully updated.');
                        location.reload();
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                        alert('Error occurred while updating data. Please try again.');
                    }
                });
            });

            $('.deleteButton').click(function() {
                var id = $(this).data('id'); // Mengambil ID penyakit dari tombol hapus yang diklik
                // console.log(id);
                if (confirm('Are you sure you want to delete this record?')) {
                    $.ajax({
                        url: '/admin/sickness/delete/' + id,
                        type: 'DELETE',
                        success: function(response) {
                            // Handle success response
                            console.log(response);
                            alert('Record successfully deleted.');
                            // Muat ulang halaman setelah penghapusan berhasil
                            location.reload();
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                            alert('Error occurred while deleting record. Please try again.');
                        }
                    });
                }
            });

        });
    </script>
@endsection
