@extends('welcome')
@section('content')
<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Danh sách phòng ban</h4>
						</div>
					</div>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th scope="col">Mã phòng ban</th>
								<th scope="col">Tên phòng ban</th>
								<th scope="col">Số lượng</th>
								<th scope="col">Địa chỉ</th>
                                <th></th>
							</tr>
						</thead>
						<tbody>
                            @foreach($room as $key => $value)
							<tr>
								<td>{{$value->ma_pb}}</td>
								<td>{{$value->ten_pb}}</td>
                                <td>{{$value->so_luong}}</td>
                                <td>{{$value->dia_chi}}</td>
                                <td>
                                                <a href="{{URL::to('/sua-phong-ban/'.$value->id_phongban)}}" class="active edit">
                                                    <i class="icon-copy fa fa-pencil" data-toggle="modal" data-target="#myModal" title="Sửa"></i>
                                                </a>          
                                                <a href="{{URL::to('/xoa-phong-ban/'.$value->id_phongban)}}" class="active delete" onclick="return confirm('Bạn muốn xóa thông tin này???')" ui-toggle-class="">
                                                    <i class="fa fa-times text-danger text" title="Xóa"></i>
                                                </a>
                                </td>
							</tr>
                            @endforeach
						</tbody>
					</table>
					<div class="collapse collapse-box" id="border-table">
						<div class="code-box">
							<div class="clearfix">
								<a href="javascript:;" class="btn btn-primary btn-sm code-copy pull-left" data-clipboard-target="#border-table-code"><i class="fa fa-clipboard"></i> Copy Code</a>
								<a href="#border-table" class="btn btn-primary btn-sm pull-right" rel="content-y" data-toggle="collapse" role="button"><i class="fa fa-eye-slash"></i> Hide Code</a>
							</div>
							<pre><code class="xml copy-pre hljs" id="border-table-code">
<span class="hljs-tag">&lt;<span class="hljs-name">table</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"table table-bordered"</span>&gt;</span>
  <span class="hljs-tag">&lt;<span class="hljs-name">thead</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">th</span> <span class="hljs-attr">scope</span>=<span class="hljs-string">"col"</span>&gt;</span>#<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span>
  <span class="hljs-tag">&lt;/<span class="hljs-name">thead</span>&gt;</span>
  <span class="hljs-tag">&lt;<span class="hljs-name">tbody</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">th</span> <span class="hljs-attr">scope</span>=<span class="hljs-string">"row"</span>&gt;</span>1<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span>
  <span class="hljs-tag">&lt;/<span class="hljs-name">tbody</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-name">table</span>&gt;</span>
							</code></pre>
						</div>
					</div>
				</div>
@endsection