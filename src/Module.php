<?php
namespace Help;

class Module
{
    const TITLE = "Help Module";
    const VERSION = "v1.0.0";
    
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}