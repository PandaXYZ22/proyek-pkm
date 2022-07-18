@extends("layout.dashboard")

@section("main")
    <form action="/event" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="event">Nama Event</label>
            <input type="text" class="form-control" required name="event" id="event" placeholder="ex : Sayembara Logo">
            <small class="form-text text-muted"><span class="text-danger">*</span>wajib</small>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <input id="x" type="hidden" required name="deskripsi">
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