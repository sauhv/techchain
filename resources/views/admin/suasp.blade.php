@extends('admin/layoutadmin')
@section('title') Sửa sản phẩm  @endsection
@section('noidungchinh')
<form class="m-auto" id="frm" method="post" action="{{route('sanpham.update', $sp->id_sp)}}" > 
@csrf @method('PUT')
<div class='mb-3 '>
    <h4 class="m-0 text-center bg-info p-2"> SỬA SẢN PHẨM</h4>
</div>
<div class='mb-3 px-2'> 
    <label>Tên sản phẩm</label>
    <input name="ten_sp" type="text" class="form-control" value="{{$sp->ten_sp}}" >
</div>
<div class="mb-3 row px-2">
    <div class='col-6'> 
        <label> Giá </label> 
        <input name="gia" type="number" class="form-control" min="1" value="{{$sp->gia}}">
    </div>
    <div class='col-6'> 
        <label> Giá km</label> 
        <input name="gia_km" type="number" class="form-control" min="1" value="{{$sp->gia_km}}">
    </div>
</div>
<div class='mb-3 px-2'> 
    <label> Hình sản phẩm</label>
    <input name="hinh" type="text" class="form-control" value="{{$sp->hinh}}" >
</div>
<div class="mb-3 row px-2">
    <div class='col-6'> 
        <label> Ngày</label> 
        <input name="ngay" type="date" class="form-control" value="{{$sp->ngay}}" >
    </div>
    <div class='col-6'> 
        <label> Tính chất</label> 
        <select name="tinhchat" class="form-control">
            <option value="0" {{$sp->tinhchat==0? "selected":""}} >Bình thường</option>
            <option value="1" {{$sp->tinhchat==1? "selected":""}} >Giá rẻ</option>
            <option value="2" {{$sp->tinhchat==2? "selected":""}} >Giảm sốc</option>
            <option value="3" {{$sp->tinhchat==3? "selected":""}} >Cao cấp</option>
        </select>
    </div>
</div>
<div class="mb-3 row px-2">
        <div class='col-4'> 
        <select name="id_loai" class="form-control">
            <option value="-1">Chọn loại</option>
            @foreach( $listloai as $loai)
            <option value="{{$loai->id_loai}}" {{$loai->id_loai==$sp->id_loai? "selected":""}}>
                {{$loai->ten_loai}}
            </option>
            @endforeach
        </select>
    </div>
    <div class='col-4 p-2 text-center'> 
        <input name="anhien" type="radio" value="0" {{$sp->anhien==0? "checked":""}}> Ẩn
        <input name="anhien" type="radio" value="1" {{$sp->anhien==1? "checked":""}}> Hiện
    </div>
    <div class='col-4 p-2 text-end'> 
        <input name="hot" type="radio" value="0" {{$sp->hot==0? "checked":""}}> Bình thường
        <input name="hot" type="radio" value="1" {{$sp->hot==1? "checked":""}}> Nổi bật
    </div>
</div>
<div class='mb-3 px-2'> 
    <label> Mô tả</label>
    <textarea name="mota" rows="4" class="form-control">{{$sp->mota}}</textarea>
</div>
<div class='mb-3 px-2'> 
    <button type="submit" class="btn-primary py-2 px-5 border-0"> Lưu database</button>
</div>
</form>
@endsection
