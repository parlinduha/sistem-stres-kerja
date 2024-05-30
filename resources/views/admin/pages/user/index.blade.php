@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
             <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" id="formTitle">Create Data</h4>
                        <form id="userForm" class="forms-sample" action="" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-sm-12 col-form-label">Nama</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control form-control-sm" name="name" id="name"
                                        placeholder="Nama">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-12 col-form-label">Email</label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control form-control-sm" name="email" id="email"
                                        placeholder="example@email.com">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-12 col-form-label">Password</label>
                                <div class="col-sm-12">
                                    <input type="password" class="form-control form-control-sm" name="password"
                                        id="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password_confirmation" class="col-sm-12 col-form-label">Konfirmasi
                                    Password</label>
                                <div class="col-sm-12">
                                    <input type="password" class="form-control form-control-sm" name="password_confirmation"
                                        id="password_confirmation" placeholder="Konfirmasi Password">
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
                        <h4 class="card-title">User Manajement</h4>
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Create At</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($users as $user)
                                        <tr>
                                            <td scope="row">{{ $no++ }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>
                                                <button data-id="{{ $user->id }}"
                                                    class="btn btn-sm btn-warning editButton">Edit</button>
                                                <button data-id="{{ $user->id }}"
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
                    url: '/admin/user/' + id,
                    type: 'GET',
                    success: function(response) {
                        $('#name').val(response.name);
                        $('#email').val(response.email);
                        $('#password').val(response.password);
                        $('#formTitle').text('Update Data');
                        $('#submitButton').text('Update');
                        // Simpan ID penyakit dalam atribut data pada formulir
                        $('#userForm').attr('data-id', id);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });

            $('#cancelButton').click(function(event) {
                event.preventDefault();
                $('#userForm').trigger('reset');
                $('#formTitle').text('Create Data');
                $('#submitButton').text('Submit');
                // Hapus atribut data-id saat membatalkan
                $('#userForm').removeAttr('data-id');
            });

            $('#userForm').submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                console.log(formData);
                // Dapatkan ID penyakit dari atribut data pada formulir
                var id = $(this).data('id');
                var url = $('#formTitle').text() === 'Create Data' ? '/admin/user/store' :
                    '/admin/user/update/' + id;
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
                        url: '/admin/user/delete/' + id,
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
