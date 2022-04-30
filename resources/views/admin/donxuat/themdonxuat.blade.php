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
										<select class="custom-select col-12" name="id_TH" id="selectId">
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
													<option value="AK">Đã thanh toán</option>
													<option value="HI">Chưa thanh toán</option>
												</optgroup>
											</select>
										</div>
									</div>
								</div>
						
						</div>
						<FIELDSET style="border-collapse: collapse;border: 1px solid red" class="pd-20 card-box mb-30">
            <legend class="ml-2">Chi tiết đơn</legend>
            <div class="form-row ml-4">

                <div class="col-md-4 form-group mb-3">
                    <label class="" for="validationDefault01">Sản Phẩm</label>
                    <div class="form-group">
						<select class="custom-select col-12" name="id_HH">
							<option selected="">Choose...</option>
							@foreach($loaihanghoa as $key=>$cate)
								<option value="{{$cate->id_LHH}}">{{$cate->ten_LHH}}</option>
							@endforeach
						</select>
					</div>
                </div>
                <div class="col-md-3 form-group mb-3">
                    <label for="validationDefault01">Số lượng</label>
                    <input type="number" class="form-control" value="1" id="soluong" name="soluong"  placeholder="Số lượng" >
                </div>
                <div class="col-md-2 form-group mb-3">
                    <label for="validationDefault01">Action</label>

                    <input class="form-control btn btn-outline-primary" id="btnThemSanPhammua" value="thêm">
                </div>

            </div>

            <table id="tblChiTietDonHang" class="table table-bordered">
                <thead>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn vị tính</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
                <th>Hành động</th>
                </thead>
                <tbody>
                </tbody>
            </table>
        </FIELDSET>
        <button type="submit" name="add" class=" mt-2 ml-5 btn-danger btn">Tạo </button>
				

@endsection

@section('myjsfile')
<script type="text/javascript">
            jQuery(document).ready(function ()
            {
                    jQuery('select[name="selectId"]').on('change',function(){
                       var categoryID = jQuery(this).val();
                       if(categoryID)
                       {
                          jQuery.ajax({
                             url : 'DonXuatController/update-brand/' +categoryID,
                             type : "GET",
                             dataType : "json",
                             success:function(data)
                             {
                                console.log(data);
                                jQuery('select[name="selectId"]').empty();
                                jQuery.each(data, function(key,value){
                                   $('select[name="selectId"]').append('<option value="'+ key +'">'+ value +'</option>');
                                });
                             }
                          });
                       }
                       else
                       {
                          $('select[name="selectId"]').empty();
                       }
                    });
            });
 </script>
@endsection
