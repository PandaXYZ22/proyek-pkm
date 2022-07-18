@extends("layout.dashboard")

@section("main")
    <form action="/mentor" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="namaMentor">Nama</label>
            <input type="text" class="form-control" required name="nama" id="namaMentor" placeholder="ex : Rahman Surahman">
            <small class="form-text text-muted"><span class="text-danger">*</span>wajib</small>
        </div>
        <div class="form-group">
            <label for="bidangMentor">Bidang</label>
            <input type="text" class="form-control" required name="bidang" id="bidangMentor" placeholder="ex : Pengembangan Sumber Daya">
            <small class="form-text text-muted"><span class="text-danger">*</span>wajib</small>
        </div>
        <div class="form-group">
            <label for="formFile" class="form-label">Gambar <small class="form-text text-muted d-inline"><span class="text-danger">*</span>dimensi 1 x 1</small></label>
            <input class="form-control" type="file" id="formFile" name="gambar">
            <small class="form-text text-muted"><span class="text-info">#</span>bisa kosong</small>
            @error('gambar')
            <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <input id="x" type="hidden" required name="deskripsi_singkat">
            <trix-editor input="x"></trix-editor>
            <small class="form-text text-muted"><span class="text-danger">*</span>wajib</small>
        </div>
        <button type="submit" class="btn btn-success">Tambah Mentor</button>
    </form>
@endsection