<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    private array $members = [
        ['nama' => 'izzal', 'nim' => '01', 'email' => 'izzal@gmail.com', 'nomor_telepon' => '123', 'alamat' => 'keputih', 'status' => 'aktif'],
        ['nama' => 'ganis', 'nim' => '02', 'email' => 'ganis@gmail.com', 'nomor_telepon' => '456', 'alamat' => 'ketintang', 'status' => 'aktif'],
        ['nama' => 'moses', 'nim' => '03', 'email' => 'moses@gmail.com', 'nomor_telepon' => '789', 'alamat' => 'gebang', 'status' => 'nonaktif'],
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = $this->members;

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

        return redirect()->route('members.index')
            ->with('success', "Member \"{$validated['nama']}\" berhasil ditambahkan (data dummy, belum tersimpan ke database).");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "MemberController@show, id: {$id}";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "MemberController@edit, id: {$id}";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "MemberController@update, id: {$id}";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "MemberController@destroy, id: {$id}";
    }
}
