<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(Request $request)
    {
        $data = Guest::latest();

        if ($request->search) {
            $data->where('name', 'like', '%'. $request->search)
            ->orWhere('phone', 'like', '%'. $request->search)
            ->orWhere('address', 'like', '%'. $request->search);
        }

        return view('guest.index', [
            'title' =>  'Daftar Tamu',
            'data'  =>  $request->search ? $data->get() : $data->paginate(5)
        ]);
    }

    public function create()
    {
        return view('guest.create', [
            'title' =>  'Form Tambah Tamu'
        ]);
    }

    public function store(Request $request)
    {
        $data = new Guest();

        $request->validate([
            'name'  =>  'required',
            'phone'  =>  'required',
            'address'  =>  'required',
        ]);

        $data->create([
            'name'  => $request->name,
            'phone'  => $request->phone,
            'address'  => $request->address,
        ]);

        return redirect()->route('guest')->with('success', 'Berhasil membuat tamu!');
    }

    public function edit($id)
    {
        $data = Guest::find($id);
        return view('guest.edit', [
            'title' =>  'Form Ubah Tamu',
            'data'  =>  $data
        ]);
    }

    public function update($id, Request $request)
    {
        $data = Guest::find($id);
        
        $data->update([
            'name'      =>  $request->name,
            'phone'      =>  $request->phone,
            'address'      =>  $request->address,
        ]);

        return redirect()->route('guest')->with('success', 'Berhasil mengubah tamu!');
    }

    public function destroy($id)
    {
        $data = Guest::find($id);

        $data->delete();
        return redirect()->route('guest')->with('success', 'Berhasil menghapus tamu!');
    }
}
