@extends('welcome')
@section('content')
<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Customer Edit</h4>
						</div>
						@foreach($suakhachhang as $key => $edit_value)
						<form action="{{URL::to('/update-customer/'.$edit_value->id_KH)}}" method="post">
							{{ csrf_field()}}
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Customer name</label>
								<div class="col-sm-12 col-md-6">
									<input class="form-control" value="{{$edit_value->ten_KH}}" name="ten_KH" >
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Email</label>
								<div class="col-sm-12 col-md-6">
									<input class="form-control" value="{{$edit_value->e_mail}}" name="e_mail" >
								</div>
							</div>
                            <div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Phone number</label>
								<div class="col-sm-12 col-md-6">
									<input class="form-control" value="{{$edit_value->dien_thoai}}" name="dien_thoai" >
								</div>
							</div>
                            <div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Address</label>
								<div class="col-sm-12 col-md-6">
									<input class="form-control" value="{{$edit_value->dia_chi}}" name="dia_chi" >
								</div>
							</div>
							<div class="pull-right">
								<button type="submit" name="add_customer" class="btn btn-primary btn-sm scroll-click" rel="content-y"  data-toggle="collapse" role="button"><i ></i>Edit</button>
							</div>
								</code></pre>
							</div>
						</div>
						<?php
							// $message = Session::get('message');
							// if($message){
							// 	echo $message;
							// 	Session::put('message',null);
							// }
						?>
						</form>
						@endforeach
					</div>
				</div>

@endsection