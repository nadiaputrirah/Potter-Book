@extends('layouts.app', ['title' => 'List - Potter Book'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card" style="background: lightblue">
                <div class="card-header mx-auto mt-5" style="color: #151224fd; font-size: 24px"><b>{{ __('Data Buku Harry Potter') }}</b></div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-9 col-md-12 col-sm-12 mt-2">
                            <form action="{{ route('book.index') }}" method="GET" role="search">

                                <div class="input-group" style="width: 30%" >
                                    <input type="text" class="form-control mr-2" name="search" placeholder="Search Book" id="search" style="background: rgb(214, 240, 248)">
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 mt-2">
                            <a href="{{ route('book.create') }}" class="btn" style="background: #050217; color:white;">Tambah Buku</a>
                        </div>
                    </div>
                    <div class="row mt-5">
                        @foreach ($books as $key)
                            <div class="col-lg-4 col-md-6 col-sm-12 mt-5">
                                <div class="card" style="background: rgba(214, 240, 248, 0.699)">
                                    <div class="card-body">
                                        <h4 class="font-weight-bold mb-4" style="color: #151224fd">{{ $key->title }}</h4>
                                        <img src="image/{{ $key->image }}" alt="" class="img-fluid card-img-top">
                                        <form action="{{ route('book.destroy',$key->id) }}" method="POST">

                                            <a class="btn btn-info mt-5" href="{{ route('book.show',$key->id) }}" style="background: #0f0738; color:white; border:none; width:84px">Detail</a>

                                            <a class="btn btn-primary mt-5 ml-3" href="{{ route('book.edit',$key->id) }}" style="background: #170f46fd; color:white; border:none; width:84px">Edit</a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger mt-5 ml-3" style="background: #050217; color:white; border:none; width:84px">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
