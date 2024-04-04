@extends('layout')
@section('noidungchinh')
<div id='sptrongloai' class="listsp">
    <h1>Sản phẩm trong loại {{ $title }} </h1>
    <div class='p-2'> {{ $listsp->onEachSide(5)->links() }} </div>
    <div id="data">
        @foreach ($listsp as $sp )
            <div class="sp"> 
                <h3>
                <a href="/sp/{{$sp->id_sp}}">    
                {{$sp->ten_sp}}
                </a>
                </h3>
                <a href="/sp/{{$sp->id_sp}}">
                <img src="{{$sp->hinh}}">
                </a>
                <div class='gia'>{{ number_format( $sp->gia , 0 , "," , ".") }} VNĐ </div>
                <a href="/themvaogio/{{$sp->id_sp}}/1">
                <button class='btnchon'>Chọn</button>
                </a>
                <button class="btnxem"> <a href="/sp/{{$sp->id_sp}}"> Xem </a> </button>
            </div>
        @endforeach
    </div>
    <!-- --phân trang -->
    <div class='p-2'> {{ $listsp->onEachSide(5)->links() }} </div>
</div>
@endsection