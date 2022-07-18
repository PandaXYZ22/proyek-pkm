<?php

namespace App\Http\Controllers;

use App\Models\Platinum;
use App\Models\Fasilitas;
use App\Models\Pembelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PlatinumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("platinum.index", [
            "title" => "Platinum",
            "platinum" => Platinum::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("platinum.create", [
            "title" => "Platinum",
            "fasilitas" => Fasilitas::get(),
            "pembelajaran" => Pembelajaran::get()
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
            "instansi" => "image|dimensions:ratio=1/1|mimes:png",
            "background" => "image|dimensions:ratio=16/9"
        ]);
        $background = null;
        $instansi = null;

        if($request->file("background")) {
            $background = $request->file("background")->store("platinum-background");
        }

        if ($request->file("instansi")) {
            $instansi = $request->file("instansi")->store("platinum-instansi");
        }
        
        Platinum::create([
            "nama" => $request->nama,
            "diskon" => $request->diskon,
            "pelajar" => $request->pelajar,
            "slogan" => $request->slogan,
            "harga_lama" => $request->harga_lama,
            "harga_baru" => $request->harga_baru,
            "deskripsi_singkat" => $request->deskripsi_singkat,
            "instansi" => $instansi,
            "background" => $background,
            "masa" => $request->masa
        ]);
        $platinum = Platinum::latest()->first()->id;
        if($request->fasilitas) {
            foreach($request->fasilitas as $item) {
                DB::table("fasilitas_platinum")->insert([
                    "fasilitas_id" => $item,
                    "platinum_id" => $platinum
                ]);
            }
        }
        if($request->pembelajaran){
            foreach($request->pembelajaran as $item) {
                DB::table("pembelajaran_platinum")->insert([
                    "pembelajaran_id" => $item,
                    "platinum_id" => $platinum
                ]);
            }
        }
        return redirect("/platinum");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Platinum  $platinum
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Platinum  $platinum
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("platinum.edit", [
            "platinum" => Platinum::find($id),
            "title" => "Platinum",
            "fasilitas" => Fasilitas::get(),
            "pembelajaran" => Pembelajaran::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Platinum  $platinum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "instansi" => "image|dimensions:ratio=1/1|mimes:png",
            "background" => "image|dimensions:ratio=16/9"
        ]);

        $background = $request->background_lama;
        $instansi = $request->instansi_lama;
        
        if($request->file("background")) {
            if ($request->background_lama) {
                Storage::delete($request->background_lama);
            }
            $background = $request->file("background")->store("platinum-background");
        }

        if ($request->file("instansi")) {
            if ($request->instansi_lama) {
                Storage::delete($request->instansi_lama);
            }
            $instansi = $request->file("instansi")->store("platinum-instansi");
        }

        DB::table("fasilitas_platinum")->where("platinum_id", $id)->delete();
        DB::table("pembelajaran_platinum")->where("platinum_id", $id)->delete();
        Platinum::find($id)->update([
            "nama" => $request->nama,
            "diskon" => $request->diskon,
            "pelajar" => $request->pelajar,
            "slogan" => $request->slogan,
            "harga_lama" => $request->harga_lama,
            "harga_baru" => $request->harga_baru,
            "deskripsi_singkat" => $request->deskripsi_singkat,
            "instansi" => $instansi,
            "background" => $background,
            "masa" => $request->masa
        ]);
        if($request->fasilitas) {
            foreach($request->fasilitas as $item) {
                DB::table("fasilitas_platinum")->insert([
                    "fasilitas_id" => $item,
                    "platinum_id" => $id
                ]);
            }
        }
        if($request->pembelajaran){
            foreach($request->pembelajaran as $item) {
                DB::table("pembelajaran_platinum")->insert([
                    "pembelajaran_id" => $item,
                    "platinum_id" => $id
                ]);
            }
        }
        return redirect("/platinum");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Platinum  $platinum
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $platinum = Platinum::find($id);
        if ($platinum->background) {
            Storage::delete($platinum->background);
        }
        if ($platinum->instansi) {
            Storage::delete($platinum->instansi);
        }
        $platinum->delete();
        DB::table("fasilitas_platinum")->where("platinum_id", $id)->delete();
        DB::table("pembelajaran_platinum")->where("platinum_id", $id)->delete();
        return redirect("/platinum");
    }
}
