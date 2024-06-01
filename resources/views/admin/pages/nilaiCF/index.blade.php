@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" id="formTitle">Create Data</h4>
                        <form id="certaintyForm" class="forms-sample" action="" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Kode Gejala</label>
                                <select class="js-example-basic-single w-100" id="code_indication" name="code_indication">
                                    <option value="AL">Pilih Kode Gejala</option>
                                    @foreach ($indication as $item)
                                        <option value="{{ $item->code_indication }}">{{ $item->code_indication }}
                                            {{ $item->name_indication }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kode Penyakit</label>
                                <select class="js-example-basic-single w-100" id="code_sickness" name="code_sickness">
                                    <option value="AL">Pilih Kode Penyakit</option>
                                    @foreach ($sickness as $item)
                                        <option value="{{ $item->code_sickness }}">{{ $item->code_sickness }}
                                            {{ $item->name_sickness }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="mb" class="col-sm-12 col-form-label">Nilai MB</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control form-control-sm" name="mb" id="mb"
                                        placeholder="Masukan nilai MB">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="md" class="col-sm-12 col-form-label">Nilai MD</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control form-control-sm" name="md" id="md"
                                        placeholder="Masukan Nilai MD">
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
                        <h4 class="card-title">Basis Pengetahuan</h4>
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Kode Penyakit</th>
                                        <th scope="col">Kode Gejala</th>
                                        <th scope="col">Nilai MB</th>
                                        <th scope="col">Nilai MD</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($nilaiCf as $item)
                                        <tr>
                                            <td scope="row">{{ $no++ }}</td>
                                            <td>{{ $item->code_indication }}</td>
                                            <td>{{ $item->code_sickness }}</td>
                                            <td>{{ $item->mb }}</td>
                                            <td>{{ $item->md }}</td>
                                            <td>
                                                <button data-id="{{ $item->id }}"
                                                    class="btn btn-sm btn-warning editButton">Edit</button>
                                                <button data-id="{{ $item->id }}"
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
                    url: '/admin/certainty/' + id,
                    type: 'GET',
                    success: function(response) {
                        $('#code_indication').val(response.code_indication);
                        $('#code_sickness').val(response.code_sickness);
                        $('#mb').val(response.mb);
                        $('#md').val(response.md);
                        $('#formTitle').text('Update Data');
                        $('#submitButton').text('Update');
                        // Simpan ID penyakit dalam atribut data pada formulir
                        $('#certaintyForm').attr('data-id', id);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });

            $('#cancelButton').click(function(event) {
                event.preventDefault();
                $('#certaintyForm').trigger('reset');
                $('#formTitle').text('Create Data');
                $('#submitButton').text('Submit');
                // Hapus atribut data-id saat membatalkan
                $('#certaintyForm').removeAttr('data-id');
            });

            $('#certaintyForm').submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                console.log(formData);
                // Dapatkan ID penyakit dari atribut data pada formulir
                var id = $(this).data('id');
                var url = $('#formTitle').text() === 'Create Data' ? '/admin/certainty/store' :
                    '/admin/certainty/update/' + id;
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
                        url: '/admin/certainty/delete/' + id,
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
