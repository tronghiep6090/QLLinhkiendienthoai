@extends('welcome')
@section('content')
<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Sửa nhân viên</h4>
						</div>
						
					</div>
                    @foreach($edit_nhanvien as $key => $value)
					<form action="{{URL::to('/edit-nhan-vien/'.$value->id_nhanvien)}}" method="post">
                        {{ csrf_field()}}
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Mã nhân viên</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="ma_nv" value="{{$value->ma_nv}}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Họ nhân viên</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="ho_nv" value="{{$value->ho_nv}}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Tên nhân viên</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="ten_nv" value="{{$value->ten_nv}}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Năm sinh</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="nam_sinh" value="{{$value->nam_sinh}}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Giới tính</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="gioi_tinh" value="{{$value->gioi_tinh}}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Quên quán</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="que_quan" value="{{$value->que_quan}}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Phòng ban</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="phong_ban" value="{{$value->phong_ban}}">
							</div>
						</div>
						<div class="form-group row">
							<label for="example-datetime-local-input" class="col-sm-12 col-md-2 col-form-label">Chức vụ</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="chuc_vu" value="{{$value->chuc_vu}}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Email</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="email" value="{{$value->email}}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Số điện thoại</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="sdt" value="{{$value->sdt}}">
							</div>
						</div>
                        <div class="pull-right">
							<button href="#basic-form1" class="btn btn-primary btn-sm scroll-click" rel="content-y"  data-toggle="collapse" role="button"><i ></i>Upload</button>
						</div>
                    </form>
                    @endforeach
						</div>

@endsection