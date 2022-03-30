@extends('welcome')
@section('content')
<div class="card-box mb-30">
				<h2 class="h4 pd-20 text-blue">Danh sách khách hàng</h2>
				<table class="data-table table nowrap" id="myTable">
					<thead>
						<tr>
							<th class="table-plus datatable-nosort">Mã khách hàng</th>
							<th>Tên khách hàng</th>
							<th>Email</th>
							<th>Số điện thoại</th>
							<th>Địa chỉ</th>
						</tr>
					</thead>
					<tbody>
					@foreach($danhsachkhachhang as $key => $value)
						<tr>
							<!-- <td class="table-plus">
								<img src="https://picsum.photos/200" width="70" height="70" alt="">
							</td> -->
							<td>
								<h5 class="font-16">{{$value->id_KH}}</h5>
							</td>
							<td>{{$value->ten_KH}}</td>
							<td>{{$value->e_mail}}</td>
							<td>{{$value->dien_thoai}}</td>
							<td>{{$value->dia_chi}}</td>
							<td>
								<div class="dropdown">
									<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
										<i class="dw dw-more"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
										<a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
										<a class="dropdown-item" href="{{URL::to('/edit-customer/'.$value->id_KH)}}"><i class="dw dw-edit2"></i> Edit</a>
										<a class="dropdown-item" href="{{URL::to('/unactive-customer/'.$value->id_KH)}}" onclick="return confirm('Bạn muốn xóa thông tin này???')" ui-toggle-class=""><i class="dw dw-delete-3"></i> Delete</a>
									</div>
								</div>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
				<!-- Start Search -->
			<script>
			function myFunction() {
			var input, filter, table, tr, td, i, txtValue;
			input = document.getElementById("myInput");
			filter = input.value.toUpperCase();
			table = document.getElementById("myTable");
			tr = table.getElementsByTagName("tr");
			for (i = 0; i < tr.length; i++) {
				td = tr[i].getElementsByTagName("td")[2];
				if (td) {
				txtValue = td.textContent || td.innerText;
				if (txtValue.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				} else {
					tr[i].style.display = "none";
				}
				}       
			}
			}
			</script>
			<!-- End Search -->
@endsection