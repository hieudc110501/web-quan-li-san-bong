<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SanNgayCaController extends Controller
{
    //show sanngayca
    public function show_sanngayca() {
        $time = Carbon::now();
        $day = $time->day;
        $month = $time->month;
        $year = $time->year;
        $getSNC = DB::table('sanngayca')
        ->join('sanca', 'sanngayca.MaSanCa', '=', 'sanca.MaSanCa')
        ->join('san', 'sanca.MaSan', '=', 'san.MaSan')
        ->join('ca', 'sanca.MaCa', '=', 'ca.MaCa')
        ->join('loaisan', 'san.MaLoaiSan', '=', 'loaisan.MaLoaiSan')
        // ->whereDay('NgayThangNam', '>=', $day)
        // ->whereMonth('NgayThangNam','>=', $month)
        // ->whereYear('NgayThangNam', '>=', $year)
        ->get();

        return view('sanngayca.index')->with(compact('getSNC'));
    }

    //show ngay
    public function show_sanngay(Request $request) {
        $time = Carbon::now();
        $day = $time->day;
        $month = $time->month;
        $year = $time->year;

        $getSNC = DB::table('sanngayca')
        ->join('sanca', 'sanngayca.MaSanCa', '=', 'sanca.MaSanCa')
        ->join('san', 'sanca.MaSan', '=', 'san.MaSan')
        ->join('ca', 'sanca.MaCa', '=', 'ca.MaCa')
        ->join('loaisan', 'san.MaLoaiSan', '=', 'loaisan.MaLoaiSan')
        ->whereDay('NgayThangNam', ($request->ngay!=0)?'=':'!=', $request->ngay)
        ->whereMonth('NgayThangNam', ($request->thang!=0)?'=':'!=', $request->thang)
        ->whereYear('NgayThangNam', ($request->nam!=0)?'=':'!=', $request->nam)
        ->get();

        return view('sanngayca.table-sanngayca')->with(compact('getSNC'));
    }
}
