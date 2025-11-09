<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    public function index()
    {
        $specializations = Specialization::withTrashed()->orderBy('created_at', 'desc')->get();
        return view('admin.specializations.index', compact('specializations'));
    }

    public function create()
    {
        return view('admin.specializations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:specializations,name',
            'description' => 'nullable|string',
        ]);

        Specialization::create($request->only('name', 'description'));

        return redirect()->route('admin.specializations.index')->with('success', 'Specialization berhasil ditambahkan.');
    }

    public function edit(Specialization $specialization)
    {
        return view('admin.specializations.edit', compact('specialization'));
    }

    public function update(Request $request, Specialization $specialization)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:specializations,name,' . $specialization->id,
            'description' => 'nullable|string',
        ]);

        $specialization->update($request->only('name', 'description'));

        return redirect()->route('admin.specializations.index')->with('success', 'Specialization berhasil diperbarui.');
    }

    public function destroy(Specialization $specialization)
    {
        $specialization->delete();
        return redirect()->route('admin.specializations.index')->with('success', 'Specialization berhasil dihapus.');
    }

    // restore soft-deleted
    public function restore($id)
    {
        $s = Specialization::withTrashed()->where('id', $id)->firstOrFail();
        $s->restore();
        return redirect()->route('admin.specializations.index')->with('success', 'Specialization berhasil dikembalikan.');
    }

    // force delete
    public function forceDelete($id)
    {
        $s = Specialization::withTrashed()->where('id', $id)->firstOrFail();
        $s->forceDelete();
        return redirect()->route('admin.specializations.index')->with('success', 'Specialization dihapus permanen.');
    }
}
