<?php
namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    // $banner nhận giá trị ảnh
    public $banner; 

    public function __construct($banner = null)
    {
        $this->banner = $banner;
    }

    public function render()
    {
        return view('components.app-layout');
    }
}
