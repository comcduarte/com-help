<?php
namespace Help\View\Helper;

use Laminas\Form\View\Helper\AbstractHelper;

class Help extends AbstractHelper
{
    private $icon;
    
    public function __invoke($icon)
    {
        $this->icon = $icon;
        return $this->render();
    }
    
    public function render()
    {
        $html = sprintf( '<i class="fas %s"></i>', $this->icon);
        return $html;
    }
}