<?php
namespace App\Helper;

class CartHelper {
    public $items = [];
    public $total_qty = 0;
    public $total_price = 0;

    public function __construct()
    {
        $this->items = session('cart') ? session('cart'):[];
        $this->total_price = $this->get_total_price();
        $this->total_qty = $this->get_total_qty();
    }

    public function add($san) {
        $item = [
            'MaSanNgayCa' => $san->MaSanNgayCa,
            'MaSanCa' => $san->MaSanCa,
            'TenSan'=> $san->TenSan,
            'NgayThangNam'=> $san->NgayThangNam,
            'TuGio'=> $san->TuGio,
            'DenGio'=> $san->DenGio,
            'DonGia'=> $san->DonGia,
            'HinhAnh'=> $san->HinhAnh,
            'MoTa'=> $san->MoTa,
        ];
        $this->items[$san->MaSanNgayCa] = $item;
        session(['cart' => $this->items]);
    }

    public function remove($id) {
        if (isset($this->items[$id])) {
            unset($this->items[$id]);
        }

        session(['cart' => $this->items]);
    }

    public function update($id) {

    }

    public function clear() {
        session(['cart' => '']);
    }

    private function get_total_price() {
        $tt = 0;
        foreach($this->items as $item) {
            $tt += $item['DonGia'];
        }
        return $tt;
    }

    private function get_total_qty() {
        $tt = 0;
        foreach($this->items as $item) {
            $tt += 1;
        }
        return $tt;
    }
}


?>
