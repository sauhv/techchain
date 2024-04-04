<section id="spgs" class="listsp">
    <h2> SẢN PHẨM XEM NHIỀU</h2>
    <div id="data">
        @foreach ($spxemnhieu as $sp )
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
</section>
