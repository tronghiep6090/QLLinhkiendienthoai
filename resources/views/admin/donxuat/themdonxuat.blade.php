@extends('welcome')
@section('content')
<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Product Delivery Add</h4>
						</div>
						<form action="{{URL::to('/save-delivery')}}" method="post">
							{{ csrf_field()}}
							</div>
							<!-- Select-2 Start -->
						<div class="pd-20 card-box mb-30">

								<div class="row">
									<div class="col-md-6">
									<div class="form-group">
											<label >Date</label>
											<input type="text" class="form-control date-picker" placeholder="Select Date">
										</div>
									</div>
									<div class="col-md-6">
									<label>Customer</label>
									<div class="form-group">
										<select class="custom-select col-12" name="id_KH">
											<option selected="">Choose...</option>
											@foreach($khachhang as $key=>$cate)
												<option value="{{$cate->id_KH}}">{{$cate->ten_KH}}</option>
											@endforeach
										</select>
									</div>
								</div>
									<div class="col-md-6">
									<label>Staff</label>
									<div class="form-group">
										<select class="custom-select col-12" name="id_NV">
											<option selected="">Choose...</option>
											@foreach($nhanvien as $key=>$cate)
												<option value="{{$cate->id_NV}}">{{$cate->ten_NV}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<label>Brand</label>
									<div class="form-group">
										<select class="custom-select col-12" name="id_TH">
											<option selected="">Choose...</option>
											@foreach($thuonghieu as $key=>$cate)
												<option value="{{$cate->id_TH}}">{{$cate->ten_TH}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<label>Product Type</label>
									<div class="form-group">
										<select class="custom-select col-12" name="id_LHH">
											<option selected="">Choose...</option>
											@foreach($loaihanghoa as $key=>$cate)
												<option value="{{$cate->id_LHH}}">{{$cate->ten_LHH}}</option>
											@endforeach
										</select>
									</div>
								</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Status</label>
											<select class=" form-control">
												<optgroup>
													<option value="AK">???? thanh to??n</option>
													<option value="HI">Ch??a thanh to??n</option>
												</optgroup>
											</select>
										</div>
									</div>
								</div>
						
						</div>
						<FIELDSET style="border-collapse: collapse;border: 1px solid red" class="pd-20 card-box mb-30">
            <legend class="ml-2">Chi ti???t ????n</legend>
            <div class="form-row ml-4">

                <div class="col-md-4 form-group mb-3">
                    <label class="" for="validationDefault01">S???n Ph???m</label>
                    <input type="text" class="form-control"  id="ten_HH" name="ten_HH"  placeholder="T??n" >
                </div>
                <div class="col-md-3 form-group mb-3">
                    <label for="validationDefault01">S??? l?????ng</label>
                    <input type="number" class="form-control" value="1" id="soluong" name="soluong"  placeholder="S??? l?????ng" >
                </div>
                <div class="col-md-2 form-group mb-3">
                    <label for="validationDefault01">Action</label>

                    <input class="form-control btn btn-outline-primary" id="btnThemSanPhammua" value="th??m">
                </div>

            </div>

            <table id="tblChiTietDonHang" class="table table-bordered">
                <thead>
                <th>S???n ph???m</th>
                <th>S??? l?????ng</th>
                <th>????n v??? t??nh</th>
                <th>????n gi??</th>
                <th>Th??nh ti???n</th>
                <th>H??nh ?????ng</th>
                </thead>
                <tbody>
                </tbody>
            </table>
        </FIELDSET>
        <button type="submit" name="add" class=" mt-2 ml-5 btn-danger btn">T???o </button>
				<!-- Select-2 end -->
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