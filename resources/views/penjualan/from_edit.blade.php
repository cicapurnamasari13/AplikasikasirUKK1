@extends('_template_back.layout')

@section('content')
    <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div>
						<h4 class="content-title mb-2">Hi, welcome back!</h4>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a   href="javascript:void(0);">Tables</a></li>
								<li class="breadcrumb-item active" aria-current="page"> Basic Tables</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- /breadcrumb -->

				<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Form Edit Data Buku
								</div>
								<div class="pd-30 pd-sm-40 bg-gray-100">
								<form action="{{ route('penjualan.update',$dt->id)}}" method="post">
								@csrf @method('PUT')
									<div class="row row-xs align-items-center mg-b-20">
										<div class="col-md-4">
											<label class="form-label mg-b-0">Tanggal Penjualan</label>
										</div>
										<div class="col-md-8 mg-t-5 mg-md-t-0">
											<input class="form-control"value="{{ $dt->tanggal_penjualan }}" placeholder="Enter your Tanggal penjualan" name="tanggal_penjualan" type="date">
										</div>
									</div>
									<div class="row row-xs align-items-center mg-b-20">
										<div class="col-md-4">
											<label class="form-label mg-b-0">Total Harga</label>
										</div>
										<div class="col-md-8 mg-t-5 mg-md-t-0">
											<input class="form-control"value="{{ $dt->total_penjualan }}" placeholder="Enter your Total Harga" name="total_harga" type="decimal">
										</div>
									</div>
									<div class="row row-xs align-items-center mg-b-20">
										<div class="col-md-4">
											<label class="form-label mg-b-0">Pelanggan Id</label>
										</div>
										<div class="col-md-8 mg-t-5 mg-md-t-0">
											<input class="form-control"value="{{ $dt->pelanggan_id }}" placeholder="Enter your Pelanggan Id" name="pelanggan_id" type="text">
										</div>
									</div>
									<button class="btn btn-primary pd-x-30 mg-e-5 mg-t-5" type="submit">SIMPAN</button>
									<a href="{{ route('penjualan.index') }}" class="btn btn-dark pd-x-30 mg-t-5"> << BACK </a>
                                </form>
								</div>
							</div>  
						</div>
					</div>
				</div>
				<!-- /row -->

@endsection