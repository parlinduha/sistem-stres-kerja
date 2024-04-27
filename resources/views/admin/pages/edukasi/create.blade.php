@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Data</h4>
                        <form class="forms-sample" action="" method="POST">
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
                                        placeholder="Author">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control form-control-sm" name="image"
                                        id="image">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-3 col-form-label">Solusi</label>
                                <div class="col-sm-9">
                                    <textarea type="text" rows="30" cols="20" class="form-control form-control-sm" name="description"
                                        id="description" placeholder="Solusi"></textarea>
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
