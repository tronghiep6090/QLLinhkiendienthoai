@extends('welcome')
@section('content')
<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Unit Edit</h4>
						</div>
						@foreach($suadonvitinh as $key => $edit_value)
						<form action="{{URL::to('/update-unit/'.$edit_value->id_DVT)}}" method="post">
							{{ csrf_field()}}
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Unit name</label>
								<div class="col-sm-12 col-md-6">
									<input class="form-control" value="{{$edit_value->don_vi}}" name="don_vi" >
								</div>
							</div>
							<div class="pull-right">
								<button type="submit" name="add_brand_product" class="btn btn-primary btn-sm scroll-click" rel="content-y"  data-toggle="collapse" role="button"><i ></i>Edit</button>
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