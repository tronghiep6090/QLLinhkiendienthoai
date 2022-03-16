@extends('welcome')
@section('content')
<div class="card-box mb-30">
    <h2 class="h4 pd-20 text-blue">Danh sách nhà cung cấp</h2>
    <table class="data-table table nowrap">
        <thead>
            <tr>
                <th class="table-plus datatable-nosort">Mã NCC</th>
                <th>Tên NCC</th>
				<th>Email</th>
                <th>Điện thoại</th>
				<th>Địa chỉ</th>
            </tr>
        </thead>
        <tbody>
        @foreach($danhsachnhacungcap as $key => $value)
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
                            <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                            <a class="dropdown-item" href="{{URL::to(''.$value->id_NCC)}}"><i class="dw dw-edit2"></i> Edit</a>
                            <a class="dropdown-item" href="{{URL::to(''.$value->id_NCC)}}" onclick="return confirm('Bạn muốn xóa thông tin này???')" ui-toggle-class=""><i class="dw dw-delete-3"></i> Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection