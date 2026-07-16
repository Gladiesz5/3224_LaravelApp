<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengurus;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class PengurusController extends Controller
{
    public function index()
    {
        $penguruses = Pengurus::with('jabatan')->latest()->get();

        return view('admin.penguruses.index', compact('penguruses'));
    }

    public function create()
    {
        $jabatans = Jabatan::all();

        return view('admin.penguruses.create', compact('jabatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jabatan_id' => 'required|exists:jabatans,id',
            'name' => 'required|max:100',
            'description' => 'required|max:255',
            'salary' => 'required|numeric',
        ]);

        Pengurus::create([
            'jabatan_id' => $request->jabatan_id,
            'name' => $request->name,
            'description' => $request->description,
            'salary' => $request->salary,
            'created_by' => auth()->user()->name ?? 'Admin',
        ]);

        return redirect()->route('admin.penguruses.index')
            ->with('success', 'Pengurus berhasil ditambahkan.');
    }

    public function edit(Pengurus $pengurus)
    {
        $jabatans = Jabatan::all();

        return view('admin.penguruses.edit', compact('pengurus', 'jabatans'));
    }

    public function update(Request $request, Pengurus $pengurus)
    {
        $request->validate([
            'jabatan_id' => 'required|exists:jabatans,id',
            'name' => 'required|max:100',
            'description' => 'required|max:255',
            'salary' => 'required|numeric',
        ]);

        $pengurus->update([
            'jabatan_id' => $request->jabatan_id,
            'name' => $request->name,
            'description' => $request->description,
            'salary' => $request->salary,
            'updated_by' => auth()->user()->name ?? 'Admin',
        ]);

        return redirect()->route('admin.penguruses.index')
            ->with('success', 'Pengurus berhasil diperbarui.');
    }

    public function destroy(Pengurus $pengurus)
    {
        $pengurus->delete();

        return redirect()->route('admin.penguruses.index')
            ->with('success', 'Pengurus berhasil dihapus.');
    }
}