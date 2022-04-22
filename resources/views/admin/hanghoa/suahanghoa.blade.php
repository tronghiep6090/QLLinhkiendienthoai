@extends('welcome')
@section('content')
<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Product Edit</h4>
						</div>
						@foreach($suahanghoa as $key => $edit_value)
						<form action="{{URL::to('/update-product/'.$edit_value->id_HH)}}" enctype="multipart/form-data" method="post">
							{{ csrf_field()}}
							</div>
                      
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Product name</label>
								<div class="col-sm-12 col-md-6">
									<input class="form-control" value="{{$edit_value->ten_HH}}" name="ten_HH" >
								</div>
							</div>
                            <div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Amount</label>
								<div class="col-sm-12 col-md-3">
									<input class="form-control" value="{{$edit_value->so_luong}}" name="so_luong" >
								</div>
							</div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Product Type</label>
                                <div class="col-sm-12 col-md-2">
                                    <select class="custom-select col-12" name="loai_HH">
                                        <option selected="">Choose...</option>
                                        @foreach($loaihanghoa as $key=>$cate)
                                            <option value="{{$cate->id_LHH}}">{{$cate->ten_LHH}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Brand name</label>
								<div class="col-sm-12 col-md-2">
								<select class="custom-select col-12" name="id_TH">
                                        <option selected="">Choose...</option>
                                        @foreach($thuonghieu as $key=>$cate)
                                            <option value="{{$cate->id_TH}}">{{$cate->ten_TH}}</option>
                                        @endforeach
                                    </select>
								</div>
							</div>
							
                            <div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Price</label>
								<div class="col-sm-12 col-md-3">
									<input class="form-control" value="{{$edit_value->gia_HH}}" name="gia_HH" >
								</div>
							</div>
							<div class="form-group">
								<label>Image</label>
								<input type="file" class="form-control-file form-control height-auto" name="hinh_anh">
								<img src="public/frontend/vendors/images/product/{{$edit_value->hinh_anh}}" />
							</div>
							<div class="form-group">
								<label class="col-sm-12 col-md-2 col-form-label">Description</label>
								<textarea class="form-control" name="mo_ta">{{$edit_value->mo_ta}}</textarea>
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