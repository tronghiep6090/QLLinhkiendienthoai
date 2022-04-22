@extends('welcome')
@section('content')
<div class="pd-20 card-box mb-30">
	<div class="clearfix">
		<div class="pull-left">
			<h4 class="text-blue h4">Product Add</h4>
		</div>
		<form action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
			{{ csrf_field()}}
			</div>
			
			<div class="form-group row">
				<label class="col-sm-12 col-md-2 col-form-label">Product name</label>
				<div class="col-sm-12 col-md-6">
					<input class="form-control" name="ten_HH" >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-12 col-md-2 col-form-label">Amount</label>
				<div class="col-sm-12 col-md-2">
					<input class="form-control" name="so_luong" >
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-12 col-md-2 col-form-label">Product type</label>
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
					<input class="form-control" name="gia_HH" >
				</div>
			</div>
			<div class="form-group">
				<label>Image</label>
				<input type="file" class="form-control-file form-control height-auto" name="hinh_anh">

			</div>
			<div class="form-group">
				<label class="col-sm-12 col-md-2 col-form-label">Description</label>
				<textarea class="form-control" name="mo_ta"></textarea>
			</div>
			
			<div class="pull-right">
				<button type="submit" name="add_brand_product" class="btn btn-primary btn-sm scroll-click" rel="content-y"  data-toggle="collapse" role="button"><i ></i>Add</button>
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
@push('img-review')
        <script>
            function previewImages() {

                var $preview = $('#preview').empty();
                if (this.files) $.each(this.files, readAndPreview);

                function readAndPreview(i, file) {

                    if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                        return alert(file.name + " is not an image");
                    } // else...

                    var reader = new FileReader();

                    $(reader).on("load", function() {
                        $preview.append($("<img/>", {
                            src: this.result,
                            height: 100
                        }));
                    });

                    reader.readAsDataURL(file);
                }

            }

            $('#file-input').on("change", previewImages);
        </script>
    @endpush
@endsection