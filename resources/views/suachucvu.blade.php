@extends('welcome')
@section('content')
<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Sửa chức vụ</h4>
						</div>
					</div>
                    @foreach($edit_chucvu as $key => $value)
					<form action="{{URL::to('/edit-chuc-vu/'.$value->id_chucvu)}}" method="post">
                        {{ csrf_field()}}
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Mã chức vụ</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="ma_cv" value="{{$value->ma_cv}}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Tên chức vụ</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="ten_cv" value="{{$value->ten_cv}}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Lương</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="luong" value="{{$value->luong}}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Mô tả</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="mo_ta" value="{{$value->mo_ta}}">
							</div>
						</div>
                        <div class="pull-right">
							<button href="#basic-form1" class="btn btn-primary btn-sm scroll-click" rel="content-y"  data-toggle="collapse" role="button"><i ></i>Upload</button>
						</div>
                    </form>
                    @endforeach
</div>
@endsection