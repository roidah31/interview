@extends('layouts.admin')

@section('title')
    <title>List rent</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">rent</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                List rent
                                <div class="float-right">
                                    
                                    <a href="{{ route('rent.create') }}" class="btn btn-primary btn-sm">Tambah</a>
                                </div>
                            </h4>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                           
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered"id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>nama penyewa</th>
                                            <th>Merk</th>
											<th>Tarif/hari</th>
                                            <th>Mulai tanggal </th>
                                            <th>Akhir tanggal</th>
											<th>Status</th>											 
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($rent as $row)
                                        <tr>
                                            <td>
											{{ $row->namalengkap}}
                                            </td>
                                            <td>
											{{ $row->merk}}
                                            </td>
											<td>
											{{ $row->platno}}
                                            </td>
											<td>
											{{ $row->start_date}}
                                            </td>
											<td>
											{{ $row->end_date}}
                                            </td>
											
                                          
                                            <td>
                                                <form action="{{ route('rent.destroy', $row->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('rent.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
