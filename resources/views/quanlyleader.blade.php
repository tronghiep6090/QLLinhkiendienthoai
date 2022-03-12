@extends('welcome')
@section('content')
<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Danh sách Leader</h4>
						</div>
					</div>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th scope="col">Mã nhân viên</th>
								<th scope="col">Họ nhân viên</th>
								<th scope="col">Tên nhân viên</th>
                                <th scope="col">Phòng ban</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($room as $key => $value)
							<tr>
								<td>{{$value->ma_nv}}</td>
								<td>{{$value->ho_nv}}</td>
                                <td>{{$value->ten_nv}}</td>
                                <td>{{$value->phong_ban}}</td>
								<!-- <td>
                                                <a href="" class="active edit">
                                                    <i class="icon-copy fa fa-pencil" data-toggle="modal" data-target="#myModal" title="Sửa"></i>
                                                </a>          
                                                <a href="{{URL::to('/xoa-nhan-vien/'.$value->id_nhanvien)}}" class="active delete" onclick="return confirm('Bạn muốn xóa thông tin này???')" ui-toggle-class="">
                                                    <i class="fa fa-times text-danger text" title="Xóa"></i>
                                                </a>
                                </td> -->
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