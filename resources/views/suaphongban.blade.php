@extends('welcome')
@section('content')
<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Sửa phòng ban</h4>
						</div>
						
					</div>
                    @foreach($edit_phongban as $key => $value)
					<form action="{{URL::to('/edit-phong-ban/'.$value->id_phongban)}}" method="post">
                        {{ csrf_field()}}
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Mã phòng ban</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="ma_pb" value="{{$value->ma_pb}}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Tên phòng ban</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="ten_pb" value="{{$value->ten_pb}}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Số lượng</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="so_luong" value="{{$value->so_luong}}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Địa chỉ</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="dia_chi" value="{{$value->dia_chi}}">
							</div>
						</div>
                        <div class="pull-right">
							<button href="#basic-form1" class="btn btn-primary btn-sm scroll-click" rel="content-y"  data-toggle="collapse" role="button"><i ></i>Upload</button>
						</div>
					</form>
					@endforeach
</div>
					@endsection

