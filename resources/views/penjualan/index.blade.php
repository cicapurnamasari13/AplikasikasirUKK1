@extends('_template_back.layout')
@section('content')
{{-- jka error atau depet --}}
<div class="main-container container-fluid"> 
<div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">DATA PENJUALAN</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Data Tables</li>
            </ol>
        </nav>
    </div>
</div>
<!-- /breadcrumb -->
<!-- Row -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex my-auto btn-list justify-content-end">
                    <!---------route create penjualan ------>
                    <a href="{{ route('penjualan.create') }}" class="btn btn-primary">Tambah Data</a>
                    <a href="{{ route('export_pdf_penjualan') }}" class="btn btn-danger">Export PDF</a>
            </div>
            @include('components.pesan')
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table border-top-0 table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Penjualan</th>
                                <th>Total Harga</th>
                                <th>Pelanggan Id</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                 
                    <tbody>
                                        @foreach ($penjualan as $dt)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $dt->tanggal_penjualan }}</td>
                                                <td>{{ $dt->total_harga }}</td>
                                                <td>{{ $dt->pelanggan_id }}</td>
                                                <td>
                                                    <a href="{{ route('penjualan.edit',$dt->id) }}" class="btn btn-sm btn-warning">Edit</a>
													<form onsubmit="return confirm('apakah anda yakin hapus data ini?')"action="{{ route('penjualan.destroy',$dt->id) }}" method="post" class="d-inline">
														@csrf @method('DELETE')
													<button type="submit" class="btn btn-sm btn-danger">Delete</button>
													</form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody> 
                                    </table>         
                
            </div>
        </div>
    </div>
</div>
</div>
@endsection