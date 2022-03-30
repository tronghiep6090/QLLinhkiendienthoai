@extends('welcome')
@section('content')
@foreach($chitiethanghoa as $key => $value)
<div class="product-detail-wrap mb-30">
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="product-slider slider-arrow">
                <div class="product-slide">
                    <img src="public/frontend/vendors/images/product/{{$value->hinh_anh}}" alt="">
                </div>
                <div class="product-slide">
                    <img src="public/frontend/vendors/images/product/{{$value->hinh_anh}}" alt="">
                </div>
                <div class="product-slide">
                    <img src="public/frontend/vendors/images/product/{{$value->hinh_anh}}" alt="">
                </div>
                <div class="product-slide">
                    <img src="public/frontend/vendors/images/product/{{$value->hinh_anh}}" alt="">
                </div>
            </div>
            <div class="product-slider-nav">
                <div class="product-slide-nav">
                    <img src="public/frontend/vendors/images/product/{{$value->hinh_anh}}" alt="">
                </div>
                <div class="product-slide-nav">
                    <img src="public/frontend/vendors/images/product/{{$value->hinh_anh}}" alt="">
                </div>
                <div class="product-slide-nav">
                    <img src="public/frontend/vendors/images/product/{{$value->hinh_anh}}" alt="">
                </div>
                <div class="product-slide-nav">
                    <img src="public/frontend/vendors/images/product/{{$value->hinh_anh}}" alt="">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="product-detail-desc pd-20 card-box height-100-p">
                <h4 class="mb-20 pt-20">Tên hàng hóa: {{$value->ten_HH}}</h4>
                <div class="price">
                Tên loại hàng hóa: <ins>{{$value->ten_LHH}}</ins>
                </div>
                <div class="price">
                Tên thương hiệu: <ins>{{$value->ten_TH}}</ins>
                </div>
                <div class="price">
                Mô tả: <ins>{{$value->mo_ta}}</ins>
                </div>
                <div class="price">
                    Giá: <ins>{{$value->gia_HH}}</ins>
                </div>
                <div class="price">
                Số lượng: <ins>{{$value->so_luong}}</ins>
                </div>
                <!-- <div class="row">
                    <div class="col-md-6 col-6">
                        <a href="#" class="btn btn-primary btn-block">Add To Cart</a>
                    </div>
                    <div class="col-md-6 col-6">
                        <a href="#" class="btn btn-outline-primary btn-block">Buy Now</a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection