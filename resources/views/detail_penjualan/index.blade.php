@extends('_template_back.layout')

@section('content')

<!-- row opened -->
				<div class="row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
                            <h4 class="card-title mg-b-2 mt-2">Data Detail Penjualan</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
                            			<div class="d-flex my-auto btn-list justify-content-end">
										<!---------route create detail penjualan ------>
									<a href="{{ route('detail_penjualan.create') }}" class="btn btn-primary">Tambah Data</a>
                    				<a href="" class="btn btn-danger">Export PDF</a>
								</div>
								@include('components.pesan')
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-bordered table-hover table-striped mg-b-0 text-md-nowrap">
										<thead>
											<tr>
												<th>No</th>
                                                <th>Produk</th>
                                                <th>Penjualan</th>
												<th>jumlah produk</th>
												<th>subtotal</th>
												<th>Action</th>
											</tr>
										</thead>
                                        
									</table>
								</div>
							</div>
						</div>
					</div>
					<!--/div-->
@endsection