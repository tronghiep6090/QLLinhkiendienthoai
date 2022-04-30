@extends('welcome')
@section('content')
<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Unit Add</h4>
						</div>
						<form action="{{URL::to('/save-unit')}}" method="post">
							{{ csrf_field()}}
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Unit name</label>
								<div class="col-sm-12 col-md-6">
									<input class="form-control" name="don_vi" >
								</div>
							</div>
							
							<div class="pull-right">
								<button type="submit" name="add_brand_product" class="btn btn-primary btn-sm scroll-click" rel="content-y"  data-toggle="collapse" role="button"><i ></i>Add</button>
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