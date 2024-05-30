@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <h4 class="card-title">Update Data</h4>
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if ($user->image)
                            <img class="card-img-top rounded-circle border border-success"
                                src="{{ asset('storage/' . $user->image) }}" alt="profile">
                        @else
                            <img class="card-img-top rounded-circle border border-success"
                                src="{{ asset('backend/images/faces/face28.jpg') }}" alt="profile">
                        @endif
                        <table class="table mt-4">
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">User Profile</h4>
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-contact-tab" data-toggle="pill"
                                    data-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                    aria-selected="false">Foto</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                    data-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                    aria-selected="false">Profile</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="pills-home-tab" data-toggle="pill" data-target="#pills-home"
                                    type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Password</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-contact" role="tabpanel"
                                aria-labelledby="pills-contact-tab">
                                <!-- Form update gambar profil -->
                                <form id="update-image-form" action="{{ route('admin.profile.updateImage') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="image">Gambar Profil</label>
                                        <input type="file" class="form-control-file" id="image" name="image">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Gambar Profil</button>
                                </form>
                            </div>
                             <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                <!-- Form update profile -->
                                <form id="update-profile-form" action="{{ route('admin.profile.update') }}"
                                    method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $user->name }}" placeholder="Nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ $user->email }}" placeholder="Email">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Profil</button>
                                </form>
                            </div>
                            <div class="tab-pane fade " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <!-- Form update password -->
                                <form id="update-password-form" action="{{ route('admin.profile.update.password') }}"
                                    method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="current_password">Password Saat Ini</label>
                                        <input type="password" class="form-control" id="current_password"
                                            name="current_password" placeholder="Password Saat Ini">
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password">Password Baru</label>
                                        <input type="password" class="form-control" id="new_password" name="new_password"
                                            placeholder="Password Baru">
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password_confirmation">Konfirmasi Password Baru</label>
                                        <input type="password" class="form-control" id="new_password_confirmation"
                                            name="new_password_confirmation" placeholder="Konfirmasi Password Baru">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
