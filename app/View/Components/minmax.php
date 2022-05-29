<?php

namespace App\View\Components;

use Illuminate\View\Component;
use DB;

class minmax extends Component
{
    public $min;
    public $max;
    private $same;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($same)
    {
        if (strstr($same, "',")) {
            $a_prices = [];
            $a_products = $this->strtoarray($same, "', ");
            $same_products = DB::table('general')->whereIn('product_name', $a_products)->orderBy('price')->get();
            $res['same_products'] = $same_products;
            foreach ($same_products as $same_product) {
                $a_prices[] = $same_product->price;
            }
            if (count($a_prices) > 0) {
                $this->min = min($a_prices);
                $this->max = max($a_prices);
            }
        }
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
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.minmax');
    }
}
