<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
        $query = Partner::query();

        // SEARCH
        // Jika ada parameter search pada request, maka query akan mencari data partner yang memiliki nama yang mirip dengan nilai search tersebut.
        if ($request->search) {

            $query->where('name', 'LIKE', '%' . $request->search . '%');

        }

        $partners = $query->latest()->get();

        return view('admin.partners.index', compact('partners'));
    }

    #method create digunakan untuk menampilkan form input data baru
    public function create()
    {
        return view('admin.partners.create');
    }

    #method store digunakan untuk menyimpan data baru ke database setelah dilakukan validasi.
    public function store(Request $request)
    {
            $request->validate([
            'name' => 'required',
            'logo_url' => 'required|url'
        ]);

        Partner::create([

            'name'=>$request->name,

            'logo_url'=>$request->logo_url

        ]);

        return redirect('/admin/partners')
            ->with('success','Partner berhasil ditambahkan');
    }

    #method show digunakan untuk menampilkan detail data partner
    public function show(Partner $partner)
    {
        return view('admin.partners.show', compact('partner'));
    }

    #method edit digunakan untuk menampilkan form edit data partner
    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    #method update digunakan untuk memperbarui data partner berdasarkan id yang dipilih
    public function update(Request $request, Partner $partner)
    {
            $request->validate([
            'name' => 'required',
            'logo_url' => 'required|url'
        ]);

        $partner->update([

            'name'=>$request->name,

            'logo_url'=>$request->logo_url

        ]);

        return redirect('/admin/partners')
            ->with('success','Partner berhasil diupdate');
    }

    #method destroy digunakan untuk menghapus data partner berdasarkan id yang dipilih
    public function destroy(Partner $partner)
    {
        $partner->delete();

        return redirect('/admin/partners')
            ->with('success','Partner berhasil dihapus');
    }
}