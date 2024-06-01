@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" id="formTitle">Create Data</h4>
                        <form id="educationForm" class="forms-sample" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="title" class="col-sm-3 col-form-label">Judul</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="title" id="title"
                                        placeholder="Judul">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="slug" class="col-sm-3 col-form-label">Slug</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="slug" id="slug"
                                        placeholder="Slug">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="author" class="col-sm-3 col-form-label">Author</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="author" id="author"
                                        placeholder="Penulis">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control-file" name="image" id="image">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-3 col-form-label">Deskripsi</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control form-control-sm" name="description" id="description"
                                        placeholder="Deskripsi"></textarea>
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
                        <h4 class="card-title">Edukasi</h4>
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col" style="width: 10%">Judul</th>
                                        <th scope="col">Penulis</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($educations as $education)
                                        <tr>
                                            <td scope="row">{{ $no++ }}</td>
                                            <td>{{ $education->title }}</td>
                                            <td>{{ $education->author }}</td>
                                            <td>
                                                <button data-id="{{ $education->id }}"
                                                    class="btn btn-sm btn-info detailButton" data-toggle="modal"
                                                    data-target="#detailModal">Detail</button>
                                                <button data-id="{{ $education->id }}"
                                                    class="btn btn-sm btn-warning editButton">Edit</button>
                                                <button data-id="{{ $education->id }}"
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

    <!-- Modal Detail -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Data Edukasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <strong>
                                    <h4 id="detailModalTitle"></h4>
                                </strong>
                                penulis : <i>
                                    <p id="detailModalAuthor"></p>
                                </i>
                                <img src="" id="detailModalImage" alt="Image" width="400" height="200"
                                    class="img-fluid">
                                <p id="detailModalDescription"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                    url: '/admin/education/' + id,
                    type: 'GET',
                    success: function(response) {
                        console.log(response); // Tampilkan respons di konsol
                        $('#detailModalTitle').text(response.title);
                        $('#detailModalSlug').text(response.slug);
                        $('#detailModalDescription').text(response.description);
                        $('#detailModalAuthor').text(response.author);
                        var imagePath = '/storage/' + response.image;
                        $('#detailModalImage').attr('src', imagePath);
                        $('#detailModal').modal('show');
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });


            $('.editButton').click(function() {
                var id = $(this).data('id');
                $.ajax({
                    url: '/admin/education/' + id,
                    type: 'GET',
                    success: function(response) {
                        $('#title').val(response.title);
                        $('#slug').val(response.slug);
                        $('#description').val(response.description);
                        $('#author').val(response.author);
                        $('#formTitle').text('Update Data');
                        $('#submitButton').text('Update');
                        // Simpan ID penyakit dalam atribut data pada formulir
                        $('#educationForm').attr('data-id', id);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });

            $('#cancelButton').click(function(event) {
                event.preventDefault();
                $('#educationForm').trigger('reset');
                $('#formTitle').text('Create Data');
                $('#submitButton').text('Submit');
                // Hapus atribut data-id saat membatalkan
                $('#educationForm').removeAttr('data-id');
            });

            $('#educationForm').submit(function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                // Dapatkan ID penyakit dari atribut data pada formulir
                var id = $(this).data('id');
                var url = $('#formTitle').text() === 'Create Data' ? '/admin/education/store' :
                    '/admin/education/update/' + id;
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
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
                        url: '/admin/education/delete/' + id,
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
