<?php

namespace App\View\Components;

use Illuminate\View\Component;

class shops extends Component
{
    public $name;
    public $url;
    public $product;
    public $message;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($product, $message)
    {
        $shops = [];
        $shops['atb'] = ['name' => 'ATB', 'url' => 'https://zakaz.atbmarket.com/product/' . $product->city_id . '/' . $product->product_id];
        $shops['silpo'] = ['name' => 'Сільпо', 'url' => 'https://shop.silpo.ua/'];
        $shops['tavriya_v'] = ['name' => 'ТавріяВ', 'url' => 'https://www.tavriav.ua/product/' . $product->product_id];
        $this->name = $shops[$product->shop]['name'];
        $this->url =  $shops[$product->shop]['url'];
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shops');
    }
}
