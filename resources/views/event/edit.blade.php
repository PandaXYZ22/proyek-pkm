@extends("layout.dashboard")

@section("main")
    <form action="/event/{{$event->id}}" method="post" enctype="multipart/form-data">
        @method("put")
        @csrf
        <input type="hidden" name="poster_lama" value="{{$event->poster}}">
        <div class="form-group">
            <label for="event">Nama Event</label>
            <input type="text" class="form-control" required name="event" id="event" value="{{$event->title}}" placeholder="ex : Sayembara Logo">
            <small class="form-text text-muted"><span class="text-danger">*</span>wajib</small>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <input id="x" type="hidden" required value="{{$event->deskripsi}}" name="deskripsi">
            <trix-editor input="x"></trix-editor>
            <small class="form-text text-muted"><span class="text-danger">*</span>wajib</small>
        </div>
        <div class="form-group">
            <label for="formFile" class="form-label">poster <small class="form-text text-muted d-inline"><span class="text-danger">*</span>ukuran A4</small></label>
            <input class="form-control" type="file" id="formFile" name="poster">
            <small class="form-text text-muted"><span class="text-info">#</span>bisa kosong</small>
            @error('poster')
            <div class="error text-danger">{{ $message }}</div>
            @enderror
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