@extends("layout.dashboard")

@section("main")
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="text-center">id</th>
                    <th class="text-center" style="min-width: 15rem">Nama</th>
                    <th class="text-center" style="min-width: 7rem">Diskon</th>
                    <th class="text-center" style="min-width: 10rem">Masa</th>
                    <th class="text-center" style="min-width: 15rem">Pelajar</th>
                    <th class="text-center" style="min-width: 15rem">Slogan</th>
                    <th class="text-center" style="min-width: 15rem">Harga Lama</th>
                    <th class="text-center" style="min-width: 15rem">Harga Baru</th>
                    <th class="text-center" style="min-width: 15rem">Deskripsi</th>
                    <th class="text-center" style="min-width: 15rem">Background</th>
                    <th class="text-center" style="min-width: 15rem">Instansi</th>
                    <th class="text-center" style="min-width: 15rem">Fasilitas</th>
                    <th class="text-center" style="min-width: 15rem">Pembelajaran</th>
                    <th class="text-center" style="min-width: 15rem">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($platinum as $item)
            <tr>
                <td class="text-center">{{$item->id}}</td>
                <td class="text-center">{{$item->nama}}</td>
                <td class="text-center">@if ($item->diskon !== null) {{$item->diskon}} @else 0 @endif %</td>
                <td class="text-center">{{$item->masa}}</td>
                <td class="text-center">{{$item->pelajar}}</td>
                <td class="text-center">{{$item->slogan}}</td>
                <td class="text-center">{{$item->harga_lama}}</td>
                <td class="text-center">{{$item->harga_baru}}</td>
                <td class="text-center">{{$item->deskripsi_singkat}}</td>
                <td class="text-center"><img style="max-height: 40px" src="/storage/{{$item->background}}" alt=""></td>
                <td class="text-center"><img style="max-height: 40px" src="/storage/{{$item->background}}" alt=""></td>
                <td class="text-center">
                    @foreach($item->fasilitas as $fasilitas)
                        <span class="badge bg-info text-white">{{$fasilitas->fasilitas}}</span>
                    @endforeach
                </td>
                <td class="text-center">
                    @foreach($item->pembelajaran as $pembelajaran)
                        <span class="badge bg-info text-white">{{$pembelajaran->pembelajaran}}</span>
                    @endforeach
                </td>
                <td class="d-flex justify-content-around">
                    <a rel="tooltip" href="/platinum/{{$item->id}}/edit" class="btn btn-success btn-sm btn-round btn-icon text-white">
                        <i class="now-ui-icons ui-2_settings-90"></i>
                    </a>
                    <form method="post" action="/platinum/{{$item->id}}" class="form-inline">
                        @method("delete")
                        @csrf
                        <button type="submit" rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
            <tr>
                <td class="text-center" colspan="13">Tambah platinum</td>
                <td class="text-center">
                    <a href="/platinum/create" rel="tooltip" class="btn btn-info rounded-pill text-white">
                        Tambah
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="d-flex">
    {!! $platinum->links() !!}
</div>
@endsection