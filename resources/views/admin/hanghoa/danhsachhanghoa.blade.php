@extends('welcome')
@section('content')
<div class="card-box mb-30">
    <h2 class="h4 pd-20 text-blue">Product List</h2>
    
    <table class="data-table table nowrap" id="myTable">
        <thead>
            <tr>
                <th class="table-plus datatable-nosort">ID</th>
                <th>Image</th>
                <th>Product name</th>
				<th>Amount</th>
                <th>Unit</th>
				<th>Product type</th>
				<!-- <th>Brand name</th> -->
				<th>Import Price</th>
                <th>Export Price</th>
            </tr>
        </thead>
        <tbody>
        @foreach($danhsachhanghoa as $key => $value)
            <tr>
                <td>
                    <h5 class="font-16">{{$value->id_HH}}</h5>
                </td>
                <td><img src="public/frontend/vendors/images/product/{{$value->hinh_anh}}" height="80" width="80"></td>
                <td>{{$value->ten_HH}}</td>
				<td>{{$value->so_luong}}</td>
                <td>{{$value->mo_ta}}</td>
				
                <td>{{$value->ten_LHH}}</td>
				<!-- <td>{{$value->ten_TH}}</td> -->

				<td>{{$value->gia_HH}}</td>
                <td>{{$value->gia_HH}}</td>
                <td>
                    <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a class="dropdown-item" href="{{URL::to('/view-product/'.$value->id_HH)}}"><i class="dw dw-eye"></i> View</a>
                            <a class="dropdown-item" href="{{URL::to('/edit-product/'.$value->id_HH)}}"><i class="dw dw-edit2"></i> Edit</a>
                            <a class="dropdown-item" href="{{URL::to('/unactive-product/'.$value->id_HH)}}" onclick="return confirm('Bạn muốn xóa thông tin này???')" ui-toggle-class=""><i class="dw dw-delete-3"></i> Delete</a>
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