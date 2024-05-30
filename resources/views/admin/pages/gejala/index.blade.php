@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" id="formTitle">Create Data</h4>
                        <form id="indicationForm" class="forms-sample" action="" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="code_indication" class="col-sm-12 col-form-label">Kode</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control form-control-sm" name="code_indication"
                                        id="code_indication" placeholder="Kode Gejala">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name_indication" class="col-sm-12 col-form-label">Gejala</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control form-control-sm" name="name_indication"
                                        id="name_indication" placeholder="Gejala">
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
                        <h4 class="card-title">Data Gejala</h4>
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Gejala</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($indications as $indication)
                                        <tr>
                                            <td scope="row">{{ $no++ }}</td>
                                            <td>{{ $indication->code_indication }}</td>
                                            <td>{{ $indication->name_indication }}</td>
                                            <td>
                                                <button data-id="{{ $indication->id }}"
                                                    class="btn btn-sm btn-warning editButton">Edit</button>
                                                <button data-id="{{ $indication->id }}"
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
                    url: '/admin/indication/' + id,
                    type: 'GET',
                    success: function(response) {
                        $('#code_indication').val(response.code_indication);
                        $('#name_indication').val(response.name_indication);
                        $('#formTitle').text('Update Data');
                        $('#submitButton').text('Update');
                        // Simpan ID penyakit dalam atribut data pada formulir
                        $('#indicationForm').attr('data-id', id);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });

            $('#cancelButton').click(function(event) {
                event.preventDefault();
                $('#indicationForm').trigger('reset');
                $('#formTitle').text('Create Data');
                $('#submitButton').text('Submit');
                // Hapus atribut data-id saat membatalkan
                $('#indicationForm').removeAttr('data-id');
            });

            $('#indicationForm').submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                console.log(formData);
                // Dapatkan ID penyakit dari atribut data pada formulir
                var id = $(this).data('id');
                var url = $('#formTitle').text() === 'Create Data' ? '/admin/indication/store' :
                    '/admin/indication/update/' + id;
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
                        url: '/admin/indication/delete/' + id,
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
