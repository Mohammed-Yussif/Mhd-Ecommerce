<?php
 
namespace InnoShop\Common\Components\Forms;

use Illuminate\View\Component;

class RichText extends Component
{
    public ?string $name;

    public ?string $title;

    public mixed $value;

    public bool $required;

    public bool $multiple;

    public function __construct(string $name, string $title, bool $required = false, $value = null, bool $multiple = false)
    {
        if (! $multiple) {
            $value = html_entity_decode($value, ENT_QUOTES);
        }

        $this->name     = $name;
        $this->title    = $title;
        $this->value    = $value;
        $this->required = $required;
        $this->multiple = $multiple;
    }

    public function render()
    {
        return view('panel::components.form.rich-text');
    }
}
