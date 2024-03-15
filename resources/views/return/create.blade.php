@extends('layouts.admin')

@section('title')
    <title>Tambah Produk</title>
@endsection

@section('content')
 @if (session('success'))
	<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if (session('failed'))
	<div class="alert alert-danger">{{ session('failed') }}</div>
@endif
            <form action="{{ route('returned.store') }}" method="post" >
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Kembali Sewa </h4>
                            </div>
                            <div class="card-body">                            
                                 <div class="form-group">
                                    <label for="name">Pilih No Sewa </label>
									<input type="hidden" name="id_user" id="id_user" class="form-control" >
									<input type="readonly" name="id_rent" id="id_rent" class="form-control" data-toggle="modal" data-target=".modal-rent"  readonly placeholder="silahkan klik bagian ini untuk memilih">
                                    <p class="text-danger">{{ $errors->first('nama_car') }}</p>
                                </div>
															
                                     <input type="hidden" id="platno" name="platno" class="form-control">
                              
								 <div class="form-group">
                                    <label for="name">Merk mobil</label>
									<input type="hidden" name="id_car" id="id_car" class="form-control" >
                                    <input type="readonly" id="merk" name="merk" class="form-control"  readonly>
                                    <p class="text-danger">{{ $errors->first('merk') }}</p>
                                </div>
								<div class="form-group">
                                    <label for="name">Tarif</label>
									<input type="readonly" name="price" id="price" class="form-control" readonly> 									
                                    <p class="text-danger">{{ $errors->first('price') }}</p>
                                </div>
								<div class="form-group">
                                    <label for="name">Plat No. yang dikembalikan</label>	
									
                                    <input type="readonly" id="nopol" name="nopol" class="form-control">
                                    <p class="text-danger">{{ $errors->first('nopol') }}</p>
                                </div>							
                            <div class="form-group">
                                    <label for="end_date">Tanggal mengembalikan</label>
									<input type="date" name="start_date" id="start_date" class="form-control" required>
                                 
                                    <p class="text-danger">{{ $errors->first('finish_date') }}</p>									
                                </div>	
								<div class="form-group">
                                    <label for="end_date">Tanggal mengembalikan</label>
									<input type="date" name="finish_date" id="finish_date" class="form-control" required>
                                    <p class="text-danger">{{ $errors->first('finish_date') }}</p>									
                                </div>								
                            </div>
							<div class="form-group">
                        <button class="btn btn-primary btn-sm" value="submit">Cek pengembalian </button>
                    </div>
                        </div>
                    </div>
                 
                </div>
            </form>

    <!-- modal Technician  -->
<div class="modal fade modal-rent" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title">History sewa</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                        </div>
                        <div class="card-body">
                                <div class="table-responsive">
                                <table id="example5" class="display min-w850">
                                        <thead>
                                                <tr>
                                                        <th>No sewa</th>
														<th>Nama Penyewa</th>
                                                        <th>Merk</th>
														<th>Platno</th>
                                                        <th>Tarif /hari</th>
														
                                                </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($rent as $b)
                                                <tr>
														<td><a id="data data1 data2 data3 data4 data5"  href="javascript:void(0)" onClick="entryRent(this,'{{ $b->id }}','{{ $b->id_user}}','{{$b->merk}}','{{$b->platno}}',{{ $b->price}},{{ $b->id_car}})" >{{ $b->id}}</a></td>
                                                        <td>{{$b->namalengkap}}</td>
														<td>{{$b->merk}}</td>
														<td>{{ $b->platno }}</td>
														<td>{{ $b->start_date }} - {{ $b->end_date}}</td>
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
        function entryRent(txt,data,data1,data2,data3,data4,data5) {
        document.getElementById('id_rent').value = data; // ini berfungsi mengisi value  yang ber id textbox   
		document.getElementById('id_user').value = data1; 
		document.getElementById('merk').value = data2; 
		document.getElementById('platno').value = data3; 
		document.getElementById('price').value = data4; 
		document.getElementById('id_car').value = data5;
	
        $(".modal-rent").modal('hide'); // ini berfungsi untuk menyembunyikan modal
        }
    </script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
@endsection