<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\User; 
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function index()
{
    $journals = Journal::where('user_id', auth()->id())->latest()->get();

    
    return view('journals.index', compact('journals'));
}


    public function create()
    {
        return view('journals.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'tanggal' => 'required|date',
        'waktu_mulai' => 'required',
        'waktu_selesai' => 'required|after:waktu_mulai',
        'aktivitas' => 'required',
        'status' => 'required|in:hadir,izin,sakit',
        'alasan' => 'required',
    ]);

    // Tambahkan user_id untuk relasi
    $validated['user_id'] = auth()->id();

    // Simpan jurnal
    Journal::create($validated);

    return redirect()->route('journals.index')->with('success', 'Jurnal berhasil ditambahkan');
}


public function magangJournals(Request $request)
{
    if ($request->has('user_id')) {
        $selectedUser = User::findOrFail($request->user_id);
        $journals = $selectedUser->journals()
            ->orderBy('tanggal', 'desc')
            ->orderBy('waktu_mulai', 'desc')
            ->get();
        
        return view('admin.journals', compact('journals', 'selectedUser'));
    }

    $users = User::where('role', 'magang')
        ->withCount('journals')
        ->get();
    
    return view('admin.journals', compact('users'));
}
}