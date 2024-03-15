@extends('layouts.admin')

@section('title')
    <title>List returned</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">returned</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                List returned
                                <div class="float-right">
                                    
                                    <a href="{{ route('returned.create') }}" class="btn btn-primary btn-sm">Tambah</a>
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
                                            <th>Merk</th>
                                            <th>Nopol</th>
											<th>Start Date</th>
                                            <th>Finish Date</th>
                                            <th>Total Day</th>
											<th>Total Price</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($ret as $row)
                                        <tr>
                                            <td>
											{{ $row->merk}}
                                            </td>
											<td>
											{{ $row->nopol}}
                                            </td>
											<td>
											{{ $row->start_date}}
                                            </td>
                                            <td>
											{{ $row->finish_date}}
                                            </td>
											<td>
											{{ $row->total_day}}
                                            </td>
											<td>
											{{ $row->total_price}}
                                            </td>                                          
                                            <td>
                                                <form action="{{ route('returned.destroy', $row->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('returned.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
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
