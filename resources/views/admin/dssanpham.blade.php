@extends('admin/layoutadmin')
@section('title') Danh sách sản phẩm @endsection
@section('noidungchinh')
@if(Session::exists('thongbao'))
<h4 class="alert alert-info text-center">{{ Session::get('thongbao') }}</h4>
@endif

<table class="table table-bordered m-auto" id="dssanpham">
    <caption align="top">DANH SÁCH SẢN PHẨM</caption>
    <tr>
        <th>Hình</th>
        <th>Tên sản phẩm </th>
        <th>Giá</th>
        <th>Ngày</th>
        <th>Trạng thái</th>
        <th>Sửa Xóa</th>
    </tr>
    @foreach($dssanpham as $sp)
    <tr>
        <td><img src="{{$sp->hinh}}" width="120" height="80"></td>
        <td><b>{{$sp->ten_sp}}</b> <br>
            Trong loại: {{$sp->ten_loai}} . Lượt xem: {{$sp->soluotxem}}
        </td>
        <td>Giá:{{ number_format($sp->gia,0,',', '.') }} <br>
            KM : {{ number_format($sp->gia_km,0,',', '.') }}
        </td>
        <td> {{date('d/m/ Y',strtotime($sp->ngay))}}</td>
        <td> Ẩn hiện: {{($sp->anhien==0)? "Đang ẩn":"Đang hiện"}} <br>
            Nổi bật: {{($sp->hot==0)? "Bình thường":"Nổi bật"}}
        </td>
        <td> 
        <a class="btn btn-primary btn-sm" href="{{route('sanpham.edit', $sp->id_sp)}}">Sửa</a>     
            <form class="d-inline" action="{{ route('sanpham.destroy', $sp->id_sp) }}" method="POST">
                @csrf @method('DELETE')
                <button type='submit' onclick="return confirm('Xóa hả')" class="btn btn-danger btn-sm">
                    Xóa
                </button>
            </form>

        </td>
    </tr>
    @endforeach
    <tr>
        <td colspan="6"> {{ $dssanpham->onEachSide(5)->links() }} </div>
        </td>
    </tr>
</table>
@endsection