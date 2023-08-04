<?php
namespace Help\View\Helper;

use Laminas\Form\View\Helper\AbstractHelper;

class Help extends AbstractHelper
{
    public function __invoke()
    {
        $html = '<i class="fa-sharp fa-regular fa-circle-info fa-beat-fade"></i>';
        return $html;
    }
}