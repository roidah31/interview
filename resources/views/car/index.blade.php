@extends('layouts.admin')

@section('title')
    <title>List car</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">car</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                List car
                                <div class="float-right">
                                    
                                    <a href="{{ route('car.create') }}" class="btn btn-primary btn-sm">Tambah</a>
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
                                <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Model</th>
                                            <th>Merk</th>
                                            <th>Nopol</th>
                                            <th>Tarif</th>
											 <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($car as $row)
                                        <tr>
                                            <td>
											{{ $row->model}}
                                            </td>
                                            <td>
											{{ $row->merk}}
                                            </td>
											<td>
											{{ $row->platno}}
                                            </td>
											<td>
											{{ $row->tarif}}
                                            </td>
											<td>
											{{ $row->status}}
                                            </td>
                                            <td>
                                                <form action="{{ route('car.destroy', $row->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('car.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
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
