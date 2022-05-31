<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Contracts\View\View;

class GeneralController extends Controller
{
    public function getcatalog(Request $request)
    {
        $res = DB::table('general')->select('category')->groupBy('category')->orderBy('category', 'ASC')->get();
        return response($res);
    }

    public function search($s)
    {
        $res = [];
        $res['s'] = $s;
        $par = '%' . mb_strtolower($s) . '%';
        // dd(DB::table('general')->where('product_name', 'like', $par)->toSql());
        $res['products'] = DB::table('general')->where(DB::raw('lower(product_name)'), 'like', $par)->get();
        $res['hmfound'] = count($res['products']);
        return view('search', $res);
    }

    public function getCategory($name)
    {
        $res = [];
        $res['name'] = $name;
        $res['cat_products'] = DB::table('general')->where(DB::raw("TRIM(category)"), '=', $name)->get();
        // dd($res['cat_products'], $name);
        $res['hmfound'] = count($res['cat_products']);
        return view('category', $res);
    }

    public function getSamePrice($id)
    {
        $res = [];

        $res['cat_products'] = DB::table('general')->where(DB::raw("TRIM(category)"), '=', $name)->get();
        // dd($res['cat_products'], $name);
        $res['hmfound'] = count($res['cat_products']);
        return view('category', $res);
    }

    public function getProduct($id)
    {
        $res = [];
        $res['product'] = DB::table('general')->where('id', $id)->first();

        if (strstr($res['product']->same, "',")) {
            // $a_prices = [];
            $a_products = $this->strtoarray($res['product']->same, "', ");
            $same_products = DB::table('general')->whereIn('product_name', $a_products)->orderBy('price')->get();
            $res['same_products'] = $same_products;
            // foreach ($same_products as $same_product) {
            //     $a_prices[] = $same_product->price;
            // }
            // $res['maxp'] = max($a_prices);
            // $res['minp'] = min($a_prices);
        }
        return view('product', $res);
    }

    private function strtoarray($a, $t = '')
    {
        $arr = [];
        $a = ltrim($a, '[');
        $a = ltrim($a, 'array(');
        $a = rtrim($a, ']');
        $a = rtrim($a, ')');
        $tmpArr = explode("',", $a);
        foreach ($tmpArr as $v) {
            if ($t == 'keys') {
                $tmp = explode("=>", $v);
                $k = $tmp[0];
                $nv = $tmp[1];
                $k = trim(trim($k), "'");
                $k = trim(trim($k), '"');
                $nv = trim(trim($nv), "'");
                $nv = trim(trim($nv), '"');
                $arr[$k] = $nv;
            } else {
                $v = trim(trim($v), "'");
                $v = trim(trim($v), '"');
                $arr[] = $v;
            }
        }
        return $arr;
    }
}
