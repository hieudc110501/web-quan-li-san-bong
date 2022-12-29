<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DichVuController extends Controller
{
    //show all
    public function show_dichvu() {
        $getDV = DB::table('dichvu')->get();
        return view('dichvu.index')->with(compact('getDV'));
    }

    //add dichvu
    public function add_dichvu(Request $request) {
        $dv = array();
        $dv['MaDichVu'] = 0;
        $dv['TenDichVu'] = $request->tendichvu;
        $dv['DonGia'] = $request->dongia;
        if ($request->image != $request->fakeimage){
            $new_img = 'image'.time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('img'),$new_img);
            $dv['HinhAnh'] = $new_img;
        } else {
            $dv['HinhAnh'] = $request->fakeimage;
        }

        $dv['MoTa'] = $request->mota;
        $new = DB::table('dichvu')->insert($dv);
        return response()->json(true, 200);
    }

    //delete dich vu
    public function delete_dichvu($id) {
        $del = DB::table('dichvu')->where('MaDichVu', $id)->delete();
        return response()->json(true, 200);
    }

    //get dichvu by id
    public function get_dichvu($id) {
        $getDV = DB::table('dichvu')->where('MaDichVu', $id)->get();
        return response()->json(['getDV' => $getDV], 200);
    }

    //edit dichvu
    public function edit_dichvu(Request $request, $id) {
        $dv = array();
        $dv['TenDichVu'] = $request->tendichvu;
        $dv['DonGia'] = $request->dongia;
        if ($request->image != $request->fakeimage){
            $new_img = 'image'.time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('img'),$new_img);
            $dv['HinhAnh'] = $new_img;
        } else {
            $dv['HinhAnh'] = $request->fakeimage;
        }

        $dv['MoTa'] = $request->mota;
        $check = DB::table('dichvu')->where('MaDichVu', $id)->update($dv);
        return response()->json(true, 200);
    }


}
