@extends('welcome')
@section('content')
@foreach($chitietdonxuat as $key => $value)
<div class="product-detail-wrap mb-30">
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="product-slider slider-arrow">
                <div class="product-slide">
                    <img src="{{asset('public/frontend/vendors/images/product/'.$value->hinh_anh)}}" alt="">
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
                <h4 class="mb-20 pt-20">Product name: {{$value->ten_HH}}</h4>
                <!-- <img src="public/frontend/vendors/images/product/{{$value->hinh_anh}}" height="80" width="80"> -->
                <div class="price">
                Product type: <ins>{{$value->ten_LHH}}</ins>
                </div>
                <div class="price">
                Brand name: <ins>{{$value->ten_TH}}</ins>
                </div>
                <div class="price">
                Description: <ins>{{$value->mo_ta}}</ins>
                </div>
                <div class="price">
                Price: <ins>{{$value->gia_HH}}</ins>
                </div>
                <div class="price">
                Amount: <ins>{{$value->so_luong}}</ins>
                </div>
                <div class="row">
                    <div class="col-md-4 col-4">
                        <label class="text-blue">Export Quantity</label>
                        <input style="text-align: center;" id="demo3_22" type="text" value="1" name="demo3_22">
                    </div>
                </div>
                <div class="row">
                <div class="col-md-4 col-4">
                <label class="text-blue">Into Money</label>
                    <input class="form-control" >
                    </div>
                    <!-- <div class="col-md-6 col-6">
                        <a href="#" class="btn btn-primary btn-block">Add To Cart</a>
                    </div> -->
                    
                </div>
                <div class="row">
                    <div class="col-md-6 col-6">
                        <a href="#" class="btn btn-primary btn-block">Add To Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<script>
		jQuery(document).ready(function() {
			jQuery('.product-slider').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: true,
				infinite: true,
				speed: 1000,
				fade: true,
				asNavFor: '.product-slider-nav'
			});
			jQuery('.product-slider-nav').slick({
				slidesToShow: 3,
				slidesToScroll: 1,
				asNavFor: '.product-slider',
				dots: false,
				infinite: true,
				arrows: false,
				speed: 1000,
				centerMode: true,
				focusOnSelect: true
			});
			$("input[name='demo3_22']").TouchSpin({
				initval: 1
			});
		});
	</script>
@endsection