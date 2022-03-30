@extends('welcome')
@section('content')
<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Thêm phiếu mua hàng</h4>
						</div>
						<form action="{{URL::to('/save-vouchers')}}" method="post">
							{{ csrf_field()}}
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Ngày lập</label>
								<div class="col-sm-12 col-md-4">
									<input class="form-control datetimepicker" name="ngay_lap" >
								</div>
							</div>
							<div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Tên hàng hóa</label>
                                <div class="col-sm-12 col-md-3">
                                    <select class="custom-select col-12" name="ten_HH">
                                        <option selected="">Choose...</option>
                                        @foreach($hanghoa as $key=>$cate)
                                            <option value="{{$cate->id_HH}}">{{$cate->ten_HH}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Số lượng</label>
								<div class="col-sm-12 col-md-1">
									<input class="form-control" name="so_luong" >
								</div>
							</div>

							<div class="pull-right">
								<button type="submit" name="add_vouchers" class="btn btn-primary btn-sm scroll-click" rel="content-y"  data-toggle="collapse" role="button"><i ></i>Thêm</button>
							</div>
								</code></pre>
							</div>
						</div>
						<!-- <?php
							// $message = Session::get('message');
							// if($message){
							// 	echo $message;
							// 	Session::put('message',null);
							// }
						?> -->
						</form>
						
					</div>
				</div>

@endsection