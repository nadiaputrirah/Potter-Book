@extends('layouts.app', ['title' => 'Detail Buku'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header mx-auto" style="color: #151224fd; font-size: 24px"><b>{{ __('Detail Buku') }}</b></div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-5">
                            <div class="form-group">
                                <img src="/image/{{ $book->image }}" width="300px" alt="">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                {{ $book->title }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Pengarang:</strong>
                                {{ $book->author }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Penerbit:</strong>
                                {{ $book->publisher }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Ditambahkan pada:</strong>
                                {{ $book->created_at }} <br>
                                <strong>Diupdate pada:</strong>
                                {{ $book->updated_at }}
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <a href="{{ route('book.index') }}" class="btn" style="background: #0f0738; color:white; border:none; width:140px">Back To List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
