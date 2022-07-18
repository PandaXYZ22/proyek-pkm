<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("mentor.index", [
            "title" => "Mentor",
            "mentor" => Mentor::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("mentor.create", [
            "title" => "Mentor"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "gambar" => "image|dimensions:ratio=1/1"
        ]);

        $gambar = null;

        if ($request->file("gambar")) {
            $gambar = $request->file("gambar")->store("gambar-mentor");
        }
        Mentor::create([
            "nama" => $request->nama,
            "bidang" => $request->bidang,
            "gambar" => $gambar,
            "deskripsi_singkat" => $request->deskripsi_singkat
        ]);
        return redirect("/mentor");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function show(Mentor $mentor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function edit(Mentor $mentor)
    {
        return view("mentor.edit", [
            "title" => "Mentor",
            "mentor" => $mentor
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mentor $mentor)
    {
        $request->validate([
            "gambar" => "image|dimensions:ratio=1/1"
        ]);

        if ($request->file("gambar")) {
            $gambar = $request->file("gambar")->store("gambar-mentor");
        }else {
            $gambar = $request->gambar_lama;
        }
        if ($request->gambar_lama) {
            if ($request->file("gambar")) {
                Storage::delete($request->gambar_lama);
            }
        }
        $mentor->update([
            "nama" => $request->nama,
            "bidang" => $request->bidang,
            "gambar" => $gambar,
            "deskripsi_singkat" => $request->deskripsi_singkat
        ]);
        return redirect("/mentor");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mentor $mentor)
    {
        if ($mentor->gambar) {
            Storage::delete($mentor->gambar);
        }
        Mentor::destroy($mentor->id);
        return redirect("/mentor");
    }
}
