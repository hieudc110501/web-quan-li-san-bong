<?php

namespace App\Http\Controllers;

use App\Helper\CartHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DatSanController extends Controller
{

    public function show() {
        return view('datsan.index');
    }

    public function add(CartHelper $cart, $id) {
        $getSNC = DB::table('sanngayca')
        ->join('sanca', 'sanngayca.MaSanCa', '=', 'sanca.MaSanCa')
        ->join('san', 'sanca.MaSan', '=', 'san.MaSan')
        ->join('ca', 'sanca.MaCa', '=', 'ca.MaCa')
        ->join('loaisan', 'san.MaLoaiSan', '=', 'loaisan.MaLoaiSan')
        ->where('MaSanNgayCa', $id)
        ->first();

        $cart->add($getSNC);
        return response()->json(true, 200);
    }

    public function delete(CartHelper $cart, $id) {
        $cart->remove($id);
        return redirect()->back();
    }

    public function datsan(CartHelper $cart, Request $request) {
        $new_dd = array();
        $new_dd['NguoiDat'] = $request->matk;
        $new_dd['NgayDat'] = Carbon::now();
        $new_dd['TrangThai'] = 0;
        $new_dd['ThanhToan'] = 0;
        $id_dd = DB::table('dondat')->insertGetId($new_dd);

        if ($id_dd) {
            $new_ctdd = array();
            $new_ctdd['MaDonDat'] = $id_dd;
            $new_ctdd['TrangThai'] = 0;
            $new_ctdd['TongTien'] = $cart->total_price;
            $new_ctdd['ThanhToan'] = 0;
            $id_ctdd = DB::table('chitietdondat')->insertGetId($new_ctdd);

            if ($id_ctdd) {
                foreach(session('cart') as $c) {
                    DB::table('sanngayca')
                    ->where('MaSanNgayCa', $c['MaSanNgayCa'])
                    ->update(['MaChiTietDD'=> $id_ctdd, 'TinhTrang' => 1]);
                }
                $cart->clear();
                return redirect()->back();
            }
        }
    }

    public function lichsudat($id) {
        $getDD = DB::table('dondat')
        ->join('chitietdondat', 'dondat.MaDonDat', '=', 'chitietdondat.MaDonDat')
        ->join('taikhoan', 'taikhoan.MaTaiKhoan', '=', 'dondat.NguoiDat')
        ->where('NguoiDat', $id)
        ->get();
        return view('lichsu.index')->with('getDD', $getDD);
    }


    public function lichsudatchitiet($id) {
        $getCTDD = DB::table('chitietdondat')
        ->join('sanngayca', 'sanngayca.MaChiTietDD', '=', 'chitietdondat.MaChiTietDD')
        ->join('sanca', 'sanngayca.MaSanCa', '=', 'sanca.MaSanCa')
        ->join('san', 'sanca.MaSan', '=', 'san.MaSan')
        ->join('ca', 'sanca.MaCa', '=', 'ca.MaCa')
        ->join('loaisan', 'san.MaLoaiSan', '=', 'loaisan.MaLoaiSan')
        ->where('MaDonDat', $id)
        ->get();

        $qty = 0;
        foreach($getCTDD as $get) {
            $tt = $get->TongTien;
            $qty++;
        }

        return view('lichsuchitiet.index')->with('getCTDD', $getCTDD)->with('tt', $tt)->with('qty', $qty);
    }

}
