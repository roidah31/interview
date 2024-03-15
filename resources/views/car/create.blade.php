@extends('layouts.admin')

@section('title')
<title>Tambah Produk</title>
@endsection

@section('content')
<form action="{{ route('car.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Produk</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="model">Model</label>
                        <input type="text" name="model" class="form-control" value="{{ old('model') }}" required>
                        <p class="text-danger">{{ $errors->first('model') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="merk">Merk</label>
                        <input type="text" name="merk" class="form-control" value="{{ old('merk') }}" required>
                        <p class="text-danger">{{ $errors->first('merk') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="platno">Plat No.</label>
                        <input type="text" name="platno" class="form-control" value="{{ old('platno') }}" required>
                        <p class="text-danger">{{ $errors->first('platno') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="tarif">Harga</label>
                        <input type="number" name="tarif" class="form-control" value="{{ old('tarif') }}" required>
                        <p class="text-danger">{{ $errors->first('tarif') }}</p>
                    </div>


                    <div class="form-group">
                        <button class="btn btn-primary btn-sm">Tambah</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>



@endsection

@section('js')
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>
@endsection