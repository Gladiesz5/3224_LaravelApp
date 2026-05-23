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
        if ($request->search) {

            $query->where('name', 'LIKE', '%' . $request->search . '%');

        }

        $partners = $query->latest()->get();

        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'name'=>'required',

            'logo_url'=>'required'

        ]);

        Partner::create([

            'name'=>$request->name,

            'logo_url'=>$request->logo_url

        ]);

        return redirect('/admin/partners')
            ->with('success','Partner berhasil ditambahkan');
    }

    public function show(Partner $partner)
    {
        return view('admin.partners.show', compact('partner'));
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([

            'name'=>'required',

            'logo_url'=>'required'

        ]);

        $partner->update([

            'name'=>$request->name,

            'logo_url'=>$request->logo_url

        ]);

        return redirect('/admin/partners')
            ->with('success','Partner berhasil diupdate');
    }

    public function destroy(Partner $partner)
    {
        $partner->delete();

        return redirect('/admin/partners')
            ->with('success','Partner berhasil dihapus');
    }
}