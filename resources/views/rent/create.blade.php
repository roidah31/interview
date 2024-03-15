@extends('layouts.admin')

@section('title')
    <title>Tambah Produk</title>
@endsection

@section('content')
            <form action="{{ route('rent.store') }}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Buat Sewa </h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama member</label>
									<input type="hidden" name="id_user" class="form-control" value="{{ Auth::user()->id }}" required>
                                    <input type="readonly" name="namalengkap" class="form-control" value="{{ Auth::user()->namalengkap }}" required>
                                    <p class="text-danger">{{ $errors->first('namalengkap') }}</p>
                                </div>
                                 <div class="form-group">
                                    <label for="name">Pilih Mobil</label>
											<input type="hidden" name="id_car" id="id_car" class="form-control" >
									<input type="text" name="name_car" id="name_car" class="form-control" data-toggle="modal" data-target=".modal-car"  required="required">
                                    <p class="text-danger">{{ $errors->first('nama_car') }}</p>
                                </div>
								 <div class="form-group">
                                    <label for="name">Tarif</label>
								
                                    <input type="readonly" id="tarif" name="tarif" class="form-control" value="{{ old('tarif') }}" required>
                                    <p class="text-danger">{{ $errors->first('namalengkap') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="start_date">Tanggal Mulai sewa </label>
                                    <input type="date" name="start_date" id="start_date" class="form-control">{{ old('start_date') }}</input>
                                    <p class="text-danger">{{ $errors->first('start_date') }}</p>
                                </div>
								<div class="form-group">
                                    <label for="end_date">tanggal Selesai sewa</label>
                                    <input type="date" name="end_date" id="end_date" class="form-control">{{ old('end_date') }}</input>
                                    <p class="text-danger">{{ $errors->first('end_date') }}</p>
									
                                </div>
								
                            </div>
							<div class="form-group">
                        <button class="btn btn-primary btn-sm" value="submit">Buat sewa</button>
                    </div>
                        </div>
                    </div>
                 
                </div>
            </form>

    <!-- modal Technician  -->
<div class="modal fade modal-car" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title">Mobil yang di sewakan</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                        </div>
                        <div class="card-body">
                                <div class="table-responsive">
                                <table id="example5" class="display min-w850">
                                        <thead>
                                                <tr>
                                                        <th>Model</th>
                                                        <th>Merk</th>
                                                        <th>Tarif</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($car as $b)
                                                <tr>
                                                        <td>{{$b->model}}</td>
                                                        <td><a id="data data1 data2"  href="javascript:void(0)" onClick="entryCar(this,'{{ $b->id }}','{{ $b->merk }}','{{ $b->tarif }}')" >{{ $b->merk}}</a></td>
                                                        <td>{{$b->tarif}}</td>
                                                       
                                                </tr>
                                                @endforeach
                                        </tbody>
                                </table>
                                </div>
                        </div>

                </div>
        </div>
</div>
<!-- End modal Technician-->

@endsection

@section('js')
   
    <script>
   
        function entryCar(txt,data,data1,data2) {
        document.getElementById('id_car').value = data; // ini berfungsi mengisi value  yang ber id textbox   
        document.getElementById('name_car').value = data1; 
		document.getElementById('tarif').value = data2; 
        $(".modal-car").modal('hide'); // ini berfungsi untuk menyembunyikan modal
        }
    </script>

 

    

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
@endsection