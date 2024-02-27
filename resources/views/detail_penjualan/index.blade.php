@extends('_template_back.layout')
@section('content')
{{-- jka error atau depet --}}
<div class="main-container container-fluid"> 
<div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">DATA DETAIL PENJUALAN</h4>
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
                    <!---------route create buku ------>
                    <a href="{{ route('detail_penjualan.create') }}" class="btn btn-primary">Tambah Data</a>
                    <a href="" class="btn btn-danger">Export PDF</a>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table border-top-0 table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Penjualan id</th>
                                <th>Produk</th>
                                <th>Jumlah Produk</th>
                                <th>Sub Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>                 
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection