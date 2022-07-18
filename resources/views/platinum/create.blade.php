@extends("layout.dashboard")

@section("main")
    <form action="/platinum" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="namaKelas">Nama</label>
            <input type="text" class="form-control" required name="nama" id="namaKelas" placeholder="ex : kelas inggris">
            <small class="form-text text-muted"><span class="text-danger">*</span>wajib</small>
        </div>
        <div class="form-group">
            <label for="diskon">Diskon</label>
            <input type="text" class="form-control" id="diskon" name="diskon" placeholder="ex : 80">
            <small class="form-text text-muted"><span class="text-info">#</span>bisa kosong</small>
        </div>
        <div class="form-group">
            <label for="pelajar">Pelajar</label>
            <input type="text" class="form-control" id="pelajar" name="pelajar" placeholder="ex : 10 Langsung">
            <small class="form-text text-muted"><span class="text-danger">*</span>wajib</small>
        </div>
        <div class="form-group">
            <label for="slogan">Slogan</label>
            <input type="text" class="form-control" id="slogan" name="slogan" placeholder="ex : Cermat Mendetail Sampai ke Inggris">
            <small class="form-text text-muted"><span class="text-info">#</span>bisa kosong</small>
        </div>
        <div class="form-group">
            <label for="masa">Masa</label>
            <input type="number" class="form-control" required id="masa" name="masa" placeholder="ex : 12">
            <small class="form-text text-muted"><span class="text-danger">*</span>wajib</small>
        </div>
        <div class="form-group">
            <label for="harga_lama">Harga Sebelum Diskon</label>
            <input type="text" class="form-control" id="harga_lama" name="harga_lama" placeholder="ex : 12.000">
            <small class="form-text text-muted"><span class="text-danger">*</span>wajib apabila diskon diisi</small>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="text" class="form-control" required id="harga" name="harga_baru" placeholder="ex : 15.000">
            <small class="form-text text-muted"><span class="text-danger">*</span>wajib</small>
        </div>
        <div class="form-group">
            <label for="background" class="form-label">Gambar Background <small class="form-text text-muted d-inline"><span class="text-danger">*</span>dimensi 16 x 9</small></label>
            <input class="form-control" type="file" id="background" name="background">
            <small class="form-text text-muted"><span class="text-info">#</span>bisa kosong</small>
            @error('background')
            <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="instansi" class="form-label">Gambar Instansi <small class="form-text text-muted d-inline"><span class="text-danger">*</span>dimensi 1 x 1</small></label>
            <input class="form-control" type="file" id="instansi" name="instansi">
            <small class="form-text text-muted"><span class="text-info">#</span>bisa kosong</small>
            @error('instansi')
            <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>
        @if($fasilitas->isNotEmpty())<label class="d-block">Fasilitas</label>@endif
        <div class="form-group row gap-2">
            @foreach($fasilitas as $item)
            <div class="form-check col-3">
                <label class="form-check-label">
                <input class="form-check-input text-truncate" type="checkbox" id="{{$item->id}}" name="fasilitas[]" value="{{$item->id}}"> {{$item->fasilitas}}
                <span class="form-check-sign"></span>
                </label>
            </div>
            @endforeach
        </div>
        @if($pembelajaran->isNotEmpty())<label class="d-block">Pembelajaran</label>@endif
        <div class="form-group row gap-2">
            @foreach($pembelajaran as $item)
            <div class="form-check col-3">
                <label class="form-check-label">
                <input class="form-check-input text-truncate" type="checkbox" id="{{$item->id}}" name="pembelajaran[]" value="{{$item->id}}"> {{$item->pembelajaran}}
                <span class="form-check-sign"></span>
                </label>
            </div>
            @endforeach
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Deskripsi</label>
            <textarea class="form-control" required name="deskripsi_singkat" id="exampleFormControlTextarea1" rows="1"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Tambah Kelas</button>
    </form>
@endsection