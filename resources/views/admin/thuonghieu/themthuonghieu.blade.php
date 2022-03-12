@extends('welcome')
@section('content')
<!-- <div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Thêm thương hiệu</h4>
						</div>
						
					</div>
					<form action="{{URL::to('/themthuonghieu')}}" method="post">
                        {{ csrf_field()}}
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Mã thương hiệu</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="ma_nv" >
							</div>
						</div>
				
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Tên thương hiệu</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="ten_nv" >
							</div>
						</div>
				
				
					
					
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Email</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="email" >
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Số điện thoại</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="sdt" >
							</div>
						</div>
                        <div class="pull-right">
							<button href="#basic-form1" class="btn btn-primary btn-sm scroll-click" rel="content-y"  data-toggle="collapse" role="button"><i ></i>Thêm</button>
						</div>
						

							</code></pre>
						</div>
					</div>
				</div> -->
				<div class="card-box pb-10">
				<div class="h5 pd-20 mb-0">Recent Patient</div>
				<table class="data-table table nowrap">
					<thead>
						<tr>
							<th class="table-plus">Name</th>
							<th>Gender</th>
							<th>Weight</th>
							<th>Assigned Doctor</th>
							<th>Admit Date</th>
							<th>Disease</th>
							<th class="datatable-nosort">Actions</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="table-plus">
								<div class="name-avatar d-flex align-items-center">
									<div class="avatar mr-2 flex-shrink-0">
										<img src="vendors/images/photo4.jpg" class="border-radius-100 shadow" width="40" height="40" alt="">
									</div>
									<div class="txt">
										<div class="weight-600">Jennifer O. Oster</div>
									</div>
								</div>
							</td>
							<td>Female</td>
							<td>45 kg</td>
							<td>Dr. Callie Reed</td>
							<td>19 Oct 2020</td>
							<td><span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">Typhoid</span></td>
							<td>
								<div class="table-actions">
									<a href="#" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
									<a href="#" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
								</div>
							</td>
						</tr>
						<tr>
							<td class="table-plus">
								<div class="name-avatar d-flex align-items-center">
									<div class="avatar mr-2 flex-shrink-0">
										<img src="vendors/images/photo5.jpg" class="border-radius-100 shadow" width="40" height="40" alt="">
									</div>
									<div class="txt">
										<div class="weight-600">Doris L. Larson</div>
									</div>
								</div>
							</td>
							<td>Male</td>
							<td>76 kg</td>
							<td>Dr. Ren Delan</td>
							<td>22 Jul 2020</td>
							<td><span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">Dengue</span></td>
							<td>
								<div class="table-actions">
									<a href="#" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
									<a href="#" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
								</div>
							</td>
						</tr>
						<tr>
							<td class="table-plus">
								<div class="name-avatar d-flex align-items-center">
									<div class="avatar mr-2 flex-shrink-0">
										<img src="vendors/images/photo6.jpg" class="border-radius-100 shadow" width="40" height="40" alt="">
									</div>
									<div class="txt">
										<div class="weight-600">Joseph	Powell</div>
									</div>
								</div>
							</td>
							<td>Male</td>
							<td>90 kg</td>
							<td>Dr. Allen Hannagan</td>
							<td>15 Nov 2020</td>
							<td><span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">Infection</span></td>
							<td>
								<div class="table-actions">
									<a href="#" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
									<a href="#" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
								</div>
							</td>
						</tr>
						<tr>
							<td class="table-plus">
								<div class="name-avatar d-flex align-items-center">
									<div class="avatar mr-2 flex-shrink-0">
										<img src="vendors/images/photo9.jpg" class="border-radius-100 shadow" width="40" height="40" alt="">
									</div>
									<div class="txt">
										<div class="weight-600">Jake Springer</div>
									</div>
								</div>
							</td>
							<td>Female</td>
							<td>45 kg</td>
							<td>Dr. Garrett Kincy</td>
							<td>08 Oct 2020</td>
							<td><span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">Covid 19</span></td>
							<td>
								<div class="table-actions">
									<a href="#" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
									<a href="#" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
								</div>
							</td>
						</tr>
						<tr>
							<td class="table-plus">
								<div class="name-avatar d-flex align-items-center">
									<div class="avatar mr-2 flex-shrink-0">
										<img src="vendors/images/photo1.jpg" class="border-radius-100 shadow" width="40" height="40" alt="">
									</div>
									<div class="txt">
										<div class="weight-600">Paul Buckland</div>
									</div>
								</div>
							</td>
							<td>Male</td>
							<td>76 kg</td>
							<td>Dr. Maxwell Soltes</td>
							<td>12 Dec 2020</td>
							<td><span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">Asthma</span></td>
							<td>
								<div class="table-actions">
									<a href="#" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
									<a href="#" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
								</div>
							</td>
						</tr>
						<tr>
							<td class="table-plus">
								<div class="name-avatar d-flex align-items-center">
									<div class="avatar mr-2 flex-shrink-0">
										<img src="vendors/images/photo2.jpg" class="border-radius-100 shadow" width="40" height="40" alt="">
									</div>
									<div class="txt">
										<div class="weight-600">Neil Arnold</div>
									</div>
								</div>
							</td>
							<td>Male</td>
							<td>60 kg</td>
							<td>Dr. Sebastian Tandon</td>
							<td>30 Oct 2020</td>
							<td><span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">Diabetes</span></td>
							<td>
								<div class="table-actions">
									<a href="#" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
									<a href="#" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
								</div>
							</td>
						</tr>
						<tr>
							<td class="table-plus">
								<div class="name-avatar d-flex align-items-center">
									<div class="avatar mr-2 flex-shrink-0">
										<img src="vendors/images/photo8.jpg" class="border-radius-100 shadow" width="40" height="40" alt="">
									</div>
									<div class="txt">
										<div class="weight-600">Christian Dyer</div>
									</div>
								</div>
							</td>
							<td>Male</td>
							<td>80 kg</td>
							<td>Dr. Sebastian Tandon</td>
							<td>15 Jun 2020</td>
							<td><span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">Diabetes</span></td>
							<td>
								<div class="table-actions">
									<a href="#" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
									<a href="#" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
								</div>
							</td>
						</tr>
						<tr>
							<td class="table-plus">
								<div class="name-avatar d-flex align-items-center">
									<div class="avatar mr-2 flex-shrink-0">
										<img src="vendors/images/photo1.jpg" class="border-radius-100 shadow" width="40" height="40" alt="">
									</div>
									<div class="txt">
										<div class="weight-600">Doris L. Larson</div>
									</div>
								</div>
							</td>
							<td>Male</td>
							<td>76 kg</td>
							<td>Dr. Ren Delan</td>
							<td>22 Jul 2020</td>
							<td><span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">Dengue</span></td>
							<td>
								<div class="table-actions">
									<a href="#" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
									<a href="#" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
@endsection