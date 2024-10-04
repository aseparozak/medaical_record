<?php

namespace App\Http\Controllers;

use App\Models\Examiner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExaminerController extends Controller
{
    public function index()
    {
        $examiners = Examiner::all();
        return view('examiners.index', compact('examiners'));
    }   
    public function create()
    {
        return view('examiners.create');
    }
    public function show($id)
    {
        $examiner = Examiner::findOrFail($id);
        return view('examiners.show', compact('examiner'));
    }
    public function edit($id)
    {
        $examiner = Examiner::findOrFail($id);
        return view('examiners.edit', compact('examiner'));
    }
    public function update(Request $request, $id)
    {
        $examiner = Examiner::findOrFail($id);
        $examiner->update($request->all());
        return redirect()->route('examiners.index')->with('success', 'Pemeriksa berhasil diperbarui');
    }
    public function store(Request $request)
    {
        // Validasi data sebelum menyimpan
        $request->validate([
            // 'examiner_id' => 'required|string|max:255', // Dihapus
            'name' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            // Tambahkan aturan validasi lainnya sesuai kebutuhan
        ]);

        $examiner = Examiner::create($request->all());
        return redirect()->route('ukurans.create')->with('success', 'Pemeriksa berhasil ditambahkan');
    }
    public function destroy($id)
    {
        $examiner = Examiner::findOrFail($id);
        $examiner->delete();
        return redirect()->route('examiners.index')->with('success', 'Pemeriksa berhasil dihapus');
    }
}
