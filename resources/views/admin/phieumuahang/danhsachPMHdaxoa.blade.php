@extends('welcome')
@section('content')
<div class="card-box mb-30">
    <h2 class="h4 pd-20 text-red" style="color:red">Danh sách phiếu mua hàng đã xóa</h2>
    <table class="data-table table nowrap" id="myTable">
        <thead>
            <tr>
                <th class="table-plus datatable-nosort">Mã phiếu mua hàng</th>
                <th>Ngày lập</th>
                <th>Tên hàng hóa</th>
				<th>Số lượng</th>
            </tr>
        </thead>
        <tbody>
        @foreach($danhsachphieumuahangdaxoa as $key => $value)
            <tr>
            <td>
                <h5 class="font-16">{{$value->id_PMH}}</h5>
                </td>
                <td>{{$value->ngay_lap}}</td>
                <td>{{$value->id_HH}}</td>
				<td>{{$value->so_luong}}</td>
                <td>
                    <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a class="dropdown-item" href="{{URL::to('/active-vouchers/'.$value->id_PMH)}}"><i class="dw dw-eye"></i>Khôi phục</a>
                           
                            <a class="dropdown-item" href="{{URL::to('/delete-vouchers/'.$value->id_PMH)}}" onclick="return confirm('Bạn muốn xóa thông tin này???')" ui-toggle-class=""><i class="dw dw-delete-3"></i> Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection