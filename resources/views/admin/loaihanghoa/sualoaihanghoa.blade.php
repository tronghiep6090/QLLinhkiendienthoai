@extends('welcome')
@section('content')
<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Product Type Edit</h4>
						</div>
						@foreach($sualoaihanghoa as $key => $edit_value)
						<form action="{{URL::to('/update-product-type/'.$edit_value->id_LHH)}}" method="post">
							{{ csrf_field()}}
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Product type name</label>
								<div class="col-sm-12 col-md-6">
									<input class="form-control" value="{{$edit_value->ten_LHH}}" name="ten_LHH" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-12 col-md-2 col-form-label">Description</label>
								<textarea class="form-control" name="mota_LHH">{{$edit_value->mota_LHH}}</textarea>
							</div>
							<div class="pull-right">
								<button type="submit" name="add_product_type" class="btn btn-primary btn-sm scroll-click" rel="content-y"  data-toggle="collapse" role="button"><i ></i>Edit</button>
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