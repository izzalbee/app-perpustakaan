<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MemberController extends Controller
{

    public function index()
    {
        $members = Member::when(request('search'), fn ($query, $search) => $query->where('nama', 'like', "%{$search}%"))
            ->paginate(10);

        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemberRequest $request)
    {
        $validated = $request->validated();

        Member::create($validated);

        return redirect()->route('members.index')
            ->with('success', "Member \"{$validated['nama']}\" berhasil ditambahkan (data dummy, belum tersimpan ke database).");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $member = Member::findOrFail($id);

        return view('members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $member = Member::findOrFail($id);

         return view('members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $member = Member::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:200',
            'nim' => ['required', 'digits_between:1,20', Rule::unique('members', 'nim')->ignore($member->id)],
            'email' => ['required', 'email', 'max:200', Rule::unique('members', 'email')->ignore($member->id)],
            'nomor_telepon' => 'required|digits_between:1,20',
            'alamat' => 'required|string|max:300',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $member->update($validated);

        return redirect()->route('members.index')
            ->with('success', "Member \"{$validated['judul']}\" berhasil diperbarui.");
    }

    public function destroy(string $id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return redirect()->route('members.index')
            ->with('success', 'Member berhasil dihapus.');
    }
}
