<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Kelas;
use App\Models\Mentor;
use App\Models\Platinum;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home () {
        return view ( "homepage.index", [
            "title" => "Home",
            "kelas" => Kelas::get(),
            "platinum" => Platinum::get(),
            "mentor" => Mentor::get(),
            "pertanyaan" => Pertanyaan::get()
        ] );
    }

    public function about(){
        return view ( "homepage.about",
        [ "title" => "About",
        "pertanyaan" => Pertanyaan::get()
    ]);
    }

    public function showKelas($id) {
        $kelas = Kelas::find($id);
        return view("kelas.show", [
            "title" => $kelas->nama,
            "kelas" => $kelas
        ]);
    }

    public function showPlatinum($id) {
        $platinum = Platinum::find($id);
        return view("platinum.show", [
            "title" => $platinum->nama,
            "platinum" => $platinum
        ]);
    }

    public function showEvent() {
        $event = Event::get();
        if (isset(request()->title)) {
            $event = Event::where("title", "ilike", "%".request()->title."%")->get();
        }
        return view('event.event', [
            "event" => $event->toJson(),
            "title" => "Event"
        ]);
    }

    public function detailEvent ($id) {
        return view("event.show", [
            "title" => "Event",
            "event" => Event::find($id)
        ]);
    }
}
