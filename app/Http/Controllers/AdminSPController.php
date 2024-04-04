<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;

Paginator::useBootstrap();

use Illuminate\Http\Request;
use DB;

class AdminSPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perpage = 15;
        $dssp = DB::table('sanpham')->orderBy('id_sp', 'desc')
            ->join('loai', 'sanpham.id_loai', '=', 'loai.id_loai')
            ->paginate($perpage)->withQueryString(); //get //withQueryString() giữ lại tham số khi thay đổi page
        return view('admin/dssanpham', ['dssanpham' => $dssp]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listloai = DB::table('loai')->orderBy('thutu')->get();
        return view('admin/themsp', ['listloai' => $listloai]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ten_sp = $request['ten_sp'];
        $hinh = $request['hinh'];
        $gia = (int) $request['gia'];
        $gia_km = (int) $request['gia_km'];
        $tinhchat = (int) $request['tinhchat'];
        $id_loai = (int) $request['id_loai'];
        $ngay = $request['ngay'];
        $anhien = (int) $request['anhien'];
        $hot = (int) $request['hot'];
        $mota = $request['mota'];
        DB::table('sanpham')->insert([
            'ten_sp' => $ten_sp, 'hinh' => $hinh, 'gia' => $gia, 'gia_km' => $gia_km,
            'tinhchat' => $tinhchat, 'id_loai' => $id_loai, 'ngay' => $ngay,
            'anhien' => $anhien, 'hot' => $hot, 'mota' => $mota
        ]);
        return redirect('/admin/sanpham');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Request $request , string $id) {
        $sp = DB::table('sanpham')->where('id_sp', $id)->first();
        $listloai = DB::table('loai')->orderBy('thutu')->get();
        if ($sp==null){
            $request->session()->flash('thongbao','Không có sản phẩm này: '. $id);
            return redirect('/admin/sanpham');
        }
        return view('admin/suasp' , ['sp'=>$sp, 'listloai' => $listloai]);
    }    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        $ten_sp = $request['ten_sp'];
        $gia = (int) $request['gia'];
        $gia_km = (int) $request['gia_km'];
        $anhien = (int) $request['anhien'];
        $hot = (int) $request['hot'];
        $id_loai = (int) $request['id_loai'];
        $tinhchat = (int) $request['tinhchat'];
        $ngay = $request['ngay']; 
        $hinh = $request['hinh']; 
        $mota = $request['mota'];
        DB::table('sanpham')->where('id_sp', $id)
        ->update([
            'ten_sp'=>$ten_sp,'gia'=>$gia,'gia_km'=>$gia_km,
            'anhien'=>$anhien,'hot'=>$hot,'id_loai'=>$id_loai,
            'tinhchat'=>$tinhchat,'ngay'=>$ngay,'hinh'=>$hinh,'mota'=>$mota,
        ]);
        return redirect('/admin/sanpham');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Request $request, string $id) {
        DB::table('sanpham')->where('id_sp', $id)->delete();
        $request->session()->flash('thongbao', 'Đã xóa sản phẩm');
        return redirect('/admin/sanpham');
    }
    
}
