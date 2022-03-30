@extends('welcome')
@section('content')
<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Thêm loại hàng hóa</h4>
						</div>
						<form action="{{URL::to('/save-product-type')}}" method="post">
							{{ csrf_field()}}
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Tên loại hàng hóa</label>
								<div class="col-sm-12 col-md-6">
									<input class="form-control" name="ten_LHH" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-12 col-md-2 col-form-label">Mô tả</label>
								<textarea class="form-control" name="mota_LHH"></textarea>
							</div>
							<div class="pull-right">
								<button type="submit" name="add_brand_product" class="btn btn-primary btn-sm scroll-click" rel="content-y"  data-toggle="collapse" role="button"><i ></i>Thêm</button>
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
						
					</div>
				</div>

@endsection