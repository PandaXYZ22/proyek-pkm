@extends("layout.dashboard")

@section("main")
    <form action="/event/{{$event->id}}" method="post">
        @method("put")
        @csrf
        <div class="form-group">
            <label for="event">Nama Event</label>
            <input type="text" class="form-control" required name="event" id="event" value="{{$event->title}}" placeholder="ex : Sayembara Logo">
            <small class="form-text text-muted"><span class="text-danger">*</span>wajib</small>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <input id="x" type="hidden" value="{{$event->deskripsi}}" name="deskripsi">
            <trix-editor input="x"></trix-editor>
            <small class="form-text text-muted"><span class="text-danger">*</span>wajib</small>
        </div>
        <div class="form-group">
            <label for="waktu_mulai">Waktu Mulai</label>
            <input type="datetime-local" class="form-control" required name="waktu_mulai" value="{{$event->start}}" id="waktu_mulai" placeholder="ex : Rahman Surahman">
            <small class="form-text text-muted"><span class="text-danger">*</span>wajib</small>
        </div>
        <div class="form-group">
            <label for="waktu_selesai">Waktu Selesai</label>
            <input type="datetime-local" class="form-control" required name="waktu_selesai" value="{{$event->end}}" id="waktu_selesai" placeholder="ex : Rahman Surahman">
            <small class="form-text text-muted"><span class="text-danger">*</span>wajib</small>
        </div>
        <button type="submit" class="btn btn-success">Edit Event</button>
    </form>
@endsection