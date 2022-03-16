@extends('welcome')
@section('content')
<div class="card-box mb-30">
    <h2 class="h4 pd-20 text-blue">Danh sách loại hàng hóa</h2>
    <table class="data-table table nowrap">
        <thead>
            <tr>
                <th class="table-plus datatable-nosort">Mã</th>
                <th>Tên loại hàng hóa</th>
                <th>Mô tả</th>
            </tr>
        </thead>
        <tbody>
        @foreach($danhsachloaihanghoa as $key => $value)
            <tr>
                <td>
                    <h5 class="font-16">{{$value->id_LHH}}</h5>
                </td>
                <td>{{$value->ten_LHH}}</td>
                <td>{{$value->mo_ta}}</td>
                <td>
                    <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                            <a class="dropdown-item" href="{{URL::to(''.$value->id_LHH)}}"><i class="dw dw-edit2"></i> Edit</a>
                            <a class="dropdown-item" href="{{URL::to(''.$value->id_LHH)}}" onclick="return confirm('Bạn muốn xóa thông tin này???')" ui-toggle-class=""><i class="dw dw-delete-3"></i> Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection