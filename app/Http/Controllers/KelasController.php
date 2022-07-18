<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Fasilitas;
use App\Models\Pembelajaran;
use Illuminate\Http\Request;
use App\Models\FasilitasKelas;
use App\Models\KelasPembelajaran;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("kelas.index", [
            "title" => "Kelas",
            "kelas" => Kelas::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("kelas.create", [
            "title" => "Kelas",
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
            $background = $request->file("background")->store("kelas-background");
        }

        if ($request->file("instansi")) {
            $instansi = $request->file("instansi")->store("kelas-instansi");
        }

        Kelas::create([
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

        $kelas = Kelas::latest()->first()->id;
        if($request->fasilitas) {
            foreach($request->fasilitas as $item) {
                DB::table("fasilitas_kelas")->insert([
                    "fasilitas_id" => $item,
                    "kelas_id" => $kelas
                ]);
            }
        }
        if($request->pembelajaran){
            foreach($request->pembelajaran as $item) {
                DB::table("kelas_pembelajaran")->insert([
                    "pembelajaran_id" => $item,
                    "kelas_id" => $kelas
                ]);
            }
        }
        return redirect("/kelas");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("kelas.edit", [
            "kelas" => Kelas::find($id),
            "title" => "Kelas",
            "fasilitas" => Fasilitas::get(),
            "pembelajaran" => Pembelajaran::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelas  $kelas
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
            $background = $request->file("background")->store("kelas-background");
        }

        if ($request->file("instansi")) {
            if ($request->instansi_lama) {
                Storage::delete($request->instansi_lama);
            }
            $instansi = $request->file("instansi")->store("kelas-instansi");
        }

        $kelas = Kelas::find($id)->first();
        DB::table("fasilitas_kelas")->where("kelas_id", $id)->delete();
        DB::table("kelas_pembelajaran")->where("kelas_id", $id)->delete();
        $kelas->update([
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
        if ($request->fasilitas) {
            foreach($request->fasilitas as $item) {
                DB::table("fasilitas_kelas")->insert([
                    "fasilitas_id" => $item,
                    "kelas_id" => $id
                ]);
            }
        }
        if ($request->pembelajaran) {
            foreach($request->pembelajaran as $item) {
                DB::table("kelas_pembelajaran")->insert([
                    "pembelajaran_id" => $item,
                    "kelas_id" => $id
                ]);
            }
        }
        return redirect("/kelas");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = Kelas::find($id);
        if($kelas->background) {
            Storage::delete($kelas->background);
        }
        if ($kelas->instansi) {
            Storage::delete($kelas->instansi);
        }
        $kelas->delete();
        DB::table("fasilitas_kelas")->where("kelas_id", $kelas->id)->delete();
        DB::table("kelas_pembelajaran")->where("kelas_id", $kelas->id)->delete();
        return redirect("/kelas");
    }
}
