@extends('layouts.app', ['title' => 'Update Buku'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('Detail Buku') }}</div>

                <div class="card-body">
                    <div class="row">
                        <form action="{{ route('book.update',$book->id) }}" method="POST" enctype="multipart/form-data" style="color: white;">
                            @csrf
                            @method('PUT')

                             <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong style="color: #050217">Title</strong>
                                        <input type="text" name="title" value="{{ $book->title }}" class="form-control mt-2" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong style="color: #050217">Author</strong>
                                        <textarea class="form-control mt-2" name="author" placeholder="Pengarang">{{ $book->author }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong style="color: #050217">Publisher</strong>
                                        <textarea class="form-control mt-2" name="publisher" placeholder="Penerbit">{{ $book->publisher }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong style="color: #050217">Image</strong>
                                        <input type="file" name="image" class="form-control mt-2" placeholder="image" value="{{ old('gambar', $book->image) }}">
                                        <img src="/image/{{ $book->image }}" width="300px" alt="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 mt-5">
                                  <button type="submit" class="btn btn-primary" style="background: #130a3f; color:white; border:none; width:84px">Submit</button>
                                  <a href="{{ route('book.index') }}" class="btn btn-secondary" style="background: #0a0620fd; color:white; border:none; width:84px">Cancel</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
