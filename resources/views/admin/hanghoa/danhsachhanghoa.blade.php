@extends('welcome')
@section('content')
<div class="card-box mb-30">
    <h2 class="h4 pd-20 text-blue">Danh sách hàng hóa</h2>
    <table class="data-table table nowrap">
        <thead>
            <tr>
                <th class="table-plus datatable-nosort">Mã hàng hóa</th>
                <th>Tên hàng hóa</th>
				<th>Số lượng</th>
                <th>Mô tả</th>
				<th>Loại hàng hóa</th>
				<th>Mã thương hiệu</th>
				<th>Giá hàng hóa</th>
            </tr>
        </thead>
        <tbody>
        @foreach($danhsachhanghoa as $key => $value)
            <tr>
                <td>
                    <h5 class="font-16">{{$value->id_HH}}</h5>
                </td>
                <td>{{$value->ten_HH}}</td>
				<td>{{$value->so_luong}}</td>
                <td>{{$value->mo_ta}}</td>
				<td>{{$value->loai_HH}}</td>
				<td>{{$value->id_TH}}</td>
				<td>{{$value->gia_HH}}</td>
                <td>
                    <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                            <a class="dropdown-item" href="{{URL::to(''.$value->id_HH)}}"><i class="dw dw-edit2"></i> Edit</a>
                            <a class="dropdown-item" href="{{URL::to(''.$value->id_HH)}}" onclick="return confirm('Bạn muốn xóa thông tin này???')" ui-toggle-class=""><i class="dw dw-delete-3"></i> Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection