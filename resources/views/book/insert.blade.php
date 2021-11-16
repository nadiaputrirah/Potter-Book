@extends('layouts.app', ['title' => 'Create Buku'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('Tambah Buku') }}</div>

                <div class="card-body">
                    <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong style="color: #151224fd; font-size: 12px">Title</strong>
                                    <input type="text" name="title" class="form-control" placeholder="Judul Buku">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Author</strong>
                                    <textarea class="form-control" name="author" placeholder="Nama Pengarang"></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Publisher</strong>
                                    <textarea class="form-control" name="publisher" placeholder="Nama Penerbit"></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Image</strong>
                                    <input type="file" name="image" class="form-control" placeholder="image">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-primary" style="background: #050217; color:white; border:none; width:84px">Submit</button>
                                <a href="{{ route('book.index') }}" class="btn btn-secondary" style="background: #0e0929fd; color:white; border:none; width:84px">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
