<?php
 
namespace InnoShop\Common\Components;

use Illuminate\View\Component;

class NoData extends Component
{
    public string $text;

    public string $width;

    public function __construct(?string $text = '', ?string $width = '300')
    {
        $this->text  = $text;
        $this->width = $width;
    }

    public function render()
    {
        return view('panel::components.no-data');
    }
}
