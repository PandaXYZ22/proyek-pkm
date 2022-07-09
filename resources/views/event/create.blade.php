@extends("layout.dashboard")

@section("main")
    <form action="/event" method="post">
        @csrf
        <div class="form-group">
            <label for="event">Nama Event</label>
            <input type="text" class="form-control" required name="event" id="event" placeholder="ex : Sayembara Logo">
            <small class="form-text text-muted"><span class="text-danger">*</span>wajib</small>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <input id="x" type="hidden" name="deskripsi">
            <trix-editor input="x"></trix-editor>
            <small class="form-text text-muted"><span class="text-danger">*</span>wajib</small>
        </div>
        <div class="form-group">
            <label for="waktu_mulai">Waktu Mulai</label>
            <input type="datetime-local" class="form-control" required name="waktu_mulai" id="waktu_mulai">
            <small class="form-text text-muted"><span class="text-danger">*</span>wajib</small>
        </div>
        <div class="form-group">
            <label for="waktu_selesai">Waktu Selesai</label>
            <input type="datetime-local" class="form-control" required name="waktu_selesai" id="waktu_selesai">
            <small class="form-text text-muted"><span class="text-danger">*</span>wajib</small>
        </div>
        <button type="submit" class="btn btn-success">Tambah Event</button>
    </form>
@endsection