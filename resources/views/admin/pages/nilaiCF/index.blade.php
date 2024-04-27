@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Basis Pengetahuan</h4>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Kode Penyakit</th>
                                        <th scope="col">Kode Gejala</th>
                                        <th scope="col">MB</th>
                                        <th scope="col">MD</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Otto</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>Thornton</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>the Bird</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Data</h4>
                        <form class="forms-sample" action="" method="POST">
                            <div class="form-group row">
                                <label for="code_indication" class="col-sm-3 col-form-label">Kode Penyakit</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="code_sickness"
                                        id="code_sickness" placeholder="Kode Penyakit">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name_indication" class="col-sm-3 col-form-label">Kode Gejala</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="name_sickness"
                                        id="name_sickness" placeholder="Kode Gejala">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mb" class="col-sm-3 col-form-label">Nilai MB</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="mb" id="mb"
                                        placeholder="Nilai mb">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="md" class="col-sm-3 col-form-label">Nilai MD</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="md" id="md"
                                        placeholder="nilai md">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary mr-2">Submit</button>
                            <button class="btn btn-sm btn-danger">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
