@extends('layouts.app')
@section('content')

    <div class="mt-4 container">
        <div class="card">
            <div class="card-header text-center">
                <h4 class="my-2">{{$title}}</h4>
            </div>
            <div class="card-body">
                <div>
                    <div class="btn-group" style="float: right">
                        <a href="{{ route('guest.create') }}" class="btn btn-warning">Tambah Tamu</a>
                    </div>
                </div>
                <table class=" mt-3 table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No Telepon</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->address}}</td>
                                <td>
                                    <form action="{{ route('guest.delete', ['id'=>$item->id]) }}" method="post">
                                        @csrf @method('delete')
                                        <div class="btn-group">
                                            <a href="{{ route('guest.edit', ['id'=>$item->id]) }}" class="btn btn-warning">Edit</a>
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apa anda yakin?')">Delete</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if (request('search') == null)
                    <div class="mt-3">
                        <div class="mx-auto">
                            {{$data->links()}}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
