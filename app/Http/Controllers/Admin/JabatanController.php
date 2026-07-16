<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatans = Jabatan::latest()->get();
        return view('admin.jabatans.index', compact('jabatans'));
    }

    public function create()
    {
        return view('admin.jabatans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);

        Jabatan::create([
            'name' => $request->name,
            'created_by' => auth()->user()->name ?? 'Admin',
        ]);

        return redirect()->route('admin.jabatans.index')
            ->with('success', 'Jabatan berhasil ditambahkan.');
    }

    public function edit(Jabatan $jabatan)
    {
        return view('admin.jabatans.edit', compact('jabatan'));
    }

    public function update(Request $request, Jabatan $jabatan)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);

        $jabatan->update([
            'name' => $request->name,
            'updated_by' => auth()->user()->name ?? 'Admin',
        ]);

        return redirect()->route('admin.jabatans.index')
            ->with('success', 'Jabatan berhasil diperbarui.');
    }

    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();

        return redirect()->route('admin.jabatans.index')
            ->with('success', 'Jabatan berhasil dihapus.');
    }
}