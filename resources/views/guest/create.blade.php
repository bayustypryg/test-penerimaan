@extends('layouts.app')
@section('content')

    <div class="mt-4 container">
        <div class="col-md-6 mx-auto card">
            <div class="card-header text-center">
                <h4>{{$title}}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('guest.post') }}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="name" class="col-form-label">Nama</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="name" id="name" class="form-control" autofocus >
                            @error('name')
                                <small class="text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="phone" class="col-form-label">No Telepon</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="phone" id="phone" class="form-control" >
                            @error('phone')
                                <small class="text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="address" class="col-form-label">Alamat</label>
                        </div>
                        <div class="col-md-8">
                            <textarea name="address" id="address" class="form-control" ></textarea>
                            @error('address')
                                <small class="text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="btn-group" style="float: right">
                        <button type="submit" class="btn btn-warning">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
