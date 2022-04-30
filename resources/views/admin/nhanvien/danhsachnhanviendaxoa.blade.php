@extends('welcome')
@section('content')
<div class="card-box mb-30">
    <h2 class="h4 pd-20 text-red" style="color:red">Personnel Deleted</h2>
    <table class="data-table table nowrap" id="myTable">
        <thead>
            <tr>
                <th class="table-plus datatable-nosort">ID</th>
                <th>Staff name</th>
                <th>Phone number</th>
				<th>Email</th>
                <th>Address</th>
				<th>Account</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
        @foreach($danhsachnhanviendaxoa as $key => $value)
            <tr>
                <td>
                    <h5 class="font-16">{{$value->id_NV}}</h5>
                </td>
                <td>{{$value->ten_NV}}</td>
                <td>{{$value->dien_thoai}}</td>
				<td>{{$value->e_mail}}</td>
				<td>{{$value->dia_chi}}</td>
                <td>{{$value->tai_khoan}}</td>
                <td>{{$value->mat_khau}}</td>
                <td>
                    <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a class="dropdown-item" href="{{URL::to('/active-staff/'.$value->id_NV)}}"><i class="dw dw-eye"></i>Restore</a>
                           
                            <a class="dropdown-item" href="{{URL::to('/delete-staff/'.$value->id_NV)}}" onclick="return confirm('Bạn muốn xóa thông tin này???')" ui-toggle-class=""><i class="dw dw-delete-3"></i> Delete</a>
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
    td = tr[i].getElementsByTagName("td")[1];
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