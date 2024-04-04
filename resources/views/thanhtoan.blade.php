@extends('layout')
@section('noidungchinh')
<form method="post" action="luudonhang" class="col-6 m-auto border border-primary p-2 mt-2"> @csrf
    <div class="mb-3">
        Họ tên <input type="text" name="ho_ten" class="form-control shadow-none bg-warning">
    </div>
    <div class="mb-3">
        Địa chỉ <input type="text" name="dia_chi" class="form-control shadow-none bg-info">
    </div>
    <div class="mb-3">
        Điện thoại <input type="text" name="dien_thoai" class="form-control shadow-none bg-danger">
    </div>
    <div class="mb-3">
        Email <input type="email" name="email" class="form-control shadow-none bg-secondary">
    </div>
    <div class="mb-3">
        <button type="submit" name="btnsunmit" class="btn btn-primary">Lưu đơn hàng</button>
    </div>
</form>
@endsection