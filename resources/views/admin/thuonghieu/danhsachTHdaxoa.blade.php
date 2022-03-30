@extends('welcome')
@section('content')
<div class="card-box mb-30">
    <h2 class="h4 pd-20 text-red" style="color:red">Danh sách thương hiệu đã xóa</h2>
    <table class="data-table table nowrap" id="myTable">
        <thead>
            <tr>
                <th class="table-plus datatable-nosort">Mã thương hiệu</th>
                <th>Tên thương hiệu</th>
                <th>Mô tả</th>
            </tr>
        </thead>
        <tbody>
        @foreach($danhsachthuonghieudaxoa as $key => $value)
            <tr>
                <td>
                    <h5 class="font-16">{{$value->id_TH}}</h5>
                </td>
                <td>{{$value->ten_TH}}</td>
                <td>{{$value->mota_TH}}</td>
                <td>
                    <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a class="dropdown-item" href="{{URL::to('/active-brand/'.$value->id_TH)}}"><i class="dw dw-eye"></i>Khôi phục</a>
                           
                            <a class="dropdown-item" href="{{URL::to('/delete-brand/'.$value->id_TH)}}" onclick="return confirm('Bạn muốn xóa thông tin này???')" ui-toggle-class=""><i class="dw dw-delete-3"></i> Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection