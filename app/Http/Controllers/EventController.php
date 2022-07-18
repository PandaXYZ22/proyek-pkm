<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view("event.index", [
            "title" => "Event",
            "event" => Event::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("event.create", [
            "title" => "Event"
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
            "poster" => "image|dimensions:ratio=70/99"
        ]);

        $poster = null;

        if($request->file("poster")) {
            $poster = $request->file("poster")->store("poster-event");
        }

        Event::create([
            "title" => $request->event,
            "deskripsi" => $request->deskripsi,
            "poster" => $poster,
            "start" => $request->waktu_mulai,
            "end" => $request->waktu_selesai
        ]);

        return redirect("/event");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view("event.edit", [
            "title" => "Event",
            "event" => $event
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            "poster" => "image|dimensions:ratio=70/99"
        ]);

        $poster = $request->poster_lama;
        
        if($request->file("poster")) {
            if ($request->poster_lama) {
                Storage::delete($request->poster_lama);
            }
            $poster = $request->file("poster")->store("poster-event");
        }

        $event->update([
            "title" => $request->event,
            "deskripsi" => $request->deskripsi,
            "poster" => $poster,
            "start" => $request->waktu_mulai,
            "end" => $request->waktu_selesai
        ]);

        return redirect("/event");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        if ($event->poster) {
            Storage::delete($event->poster);
        }
        Event::destroy($event->id);

        return redirect("/event");
    }
}
