<?php

namespace App\View\Components;

use Illuminate\View\Component;

class shops extends Component
{
    public $name;
    public $url;
    public $product;
    public $color;
    public $message;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($product, $message)
    {
        $shops = [];
        $shops['atb'] = ['name' => 'АТБ', 'color' => '#0192d3', 'url' => 'https://zakaz.atbmarket.com/product/' . $product->city_id . '/' . $product->product_id];
        $shops['silpo'] = ['name' => 'Сільпо', 'color' => '#ff8522', 'url' => 'https://shop.silpo.ua/'];
        $shops['tavriya_v'] = ['name' => 'ТавріяВ', 'color' => '#ff574c', 'url' => 'https://www.tavriav.ua/product/' . $product->product_id];
        $this->name = $shops[$product->shop]['name'];
        $this->url =  $shops[$product->shop]['url'];
        $this->color =  $shops[$product->shop]['color'];
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
