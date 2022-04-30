@extends('welcome')
@section('content')
<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Personnel Add</h4>
						</div>
						<form action="{{URL::to('/save-staff')}}" method="post">
							{{ csrf_field()}}
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Staff name</label>
								<div class="col-sm-12 col-md-6">
									<input class="form-control" name="ten_NV" >
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Position</label>
								<div class="col-sm-12 col-md-3">
									<select class="custom-select col-12" name="id_CV">
										<option selected="">Choose...</option>
										@foreach($chucvu as $key=>$cate)
											<option value="{{$cate->id_CV}}">{{$cate->ten_CV}}</option>
										@endforeach
									</select>
								</div>
							</div>
                            <div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Phone number</label>
								<div class="col-sm-12 col-md-6">
									<input class="form-control" name="dien_thoai" >
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Email</label>
								<div class="col-sm-12 col-md-6">
									<input class="form-control" name="e_mail" >
								</div>
							</div>
                            
                            <div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Address</label>
								<div class="col-sm-12 col-md-6">
									<input class="form-control" name="dia_chi" >
								</div>
							</div>
                            <div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Account</label>
								<div class="col-sm-12 col-md-6">
									<input class="form-control" name="tai_khoan" >
								</div>
							</div>
                            <div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Password</label>
								<div class="col-sm-12 col-md-6">
									<input class="form-control" name="mat_khau" >
								</div>
							</div>
							<div class="pull-right">
								<button type="submit" name="add_staff" class="btn btn-primary btn-sm scroll-click" rel="content-y"  data-toggle="collapse" role="button"><i ></i>Add</button>
							</div>
								</code></pre>
							</div>
							
							<!-- <div class="form-group">
								<label class="col-sm-12 col-md-2 col-form-label">Trạng thái</label>
								<select class="custom-select2 form-control col-md-3" name="trangthai_TH">
									<optgroup label="Ẩn/ Hiện">
										<option value="0">Ẩn</option>
										<option value="1">Hiện</option>
									</optgroup>
								</select>
							</div> -->
						</div>
						<?php
							// $message = Session::get('message');
							// if($message){
							// 	echo $message;
							// 	Session::put('message',null);
							// }
						?>
						</form>
						
					</div>
				</div>

@endsection