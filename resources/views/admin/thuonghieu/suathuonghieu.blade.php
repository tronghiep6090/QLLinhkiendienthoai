@extends('welcome')
@section('content')
<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Brand Edit</h4>
						</div>
						@foreach($suathuonghieu as $key => $edit_value)
						<form action="{{URL::to('/update-brand/'.$edit_value->id_TH)}}" method="post">
							{{ csrf_field()}}
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Brand name</label>
								<div class="col-sm-12 col-md-6">
									<input class="form-control" value="{{$edit_value->ten_TH}}" name="ten_TH" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-12 col-md-2 col-form-label">Description</label>
								<textarea class="form-control" name="mota_TH">{{$edit_value->mota_TH}}</textarea>
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