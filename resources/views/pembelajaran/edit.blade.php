@extends("layout.dashboard")

@section("main")
    <form action="/pembelajaran/{{$pembelajaran->id}}" method="post">
        @method("put")
        @csrf
        <div class="form-group">
            <label for="pembelajaran">Pembelajaran</label>
            <input type="text" class="form-control" value="{{$pembelajaran->pembelajaran}}" required name="pembelajaran" id="pembelajaran" placeholder="ex : Matematika">
            <small class="form-text text-muted"><span class="text-danger">*</span>wajib</small>
        </div>
        @error('pembelajaran')
            <div class="error text-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-success">Edit Pembelajaran</button>
    </form>
@endsection