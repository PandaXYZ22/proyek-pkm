@extends("layout.dashboard")

@section("main")
    <form action="/pembelajaran" method="post">
        @csrf
        <div class="form-group">
            <label for="pembelajaran">Pembelajaran</label>
            <input type="text" class="form-control" required name="pembelajaran" id="pembelajaran" placeholder="ex : siapa saya ?">
            <small class="form-text text-muted"><span class="text-danger">*</span>wajib</small>
        </div>
        @error('pembelajaran')
            <div class="error text-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-success">Tambah Pembelajaran</button>
    </form>
@endsection