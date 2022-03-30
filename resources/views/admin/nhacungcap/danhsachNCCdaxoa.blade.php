@extends('welcome')
@section('content')
<div class="card-box mb-30">
    <h2 class="h4 pd-20 text-red" style="color:red">Danh sách nhà cung cấp đã xóa</h2>
    <table class="data-table table nowrap" id="myTable">
        <thead>
            <tr>
                <th class="table-plus datatable-nosort">Mã nhà cung cấp</th>
                <th>Tên nhà cung cấp</th>
                <th>Email</th>
                <th>Điện thoại</th>
                <th>Địa chỉ</th>
            </tr>
        </thead>
        <tbody>
        @foreach($danhsachnhacungcapdaxoa as $key => $value)
            <tr>
                <td>
                    <h5 class="font-16">{{$value->id_NCC}}</h5>
                </td>
                <td>{{$value->ten_NCC}}</td>
                <td>{{$value->e_mail}}</td>
                <td>{{$value->dien_thoai}}</td>
                <td>{{$value->dia_chi}}</td>
                <td>
                    <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a class="dropdown-item" href="{{URL::to('/active-manufacture/'.$value->id_NCC)}}"><i class="dw dw-eye"></i>Khôi phục</a>
                           
                            <a class="dropdown-item" href="{{URL::to('/delete-manufacture/'.$value->id_NCC)}}" onclick="return confirm('Bạn muốn xóa thông tin này???')" ui-toggle-class=""><i class="dw dw-delete-3"></i> Delete</a>
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