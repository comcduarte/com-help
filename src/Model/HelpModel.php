<?php
namespace Help\Model;

use Components\Model\AbstractBaseModel;

class HelpModel extends AbstractBaseModel
{
    public $ICON;
    
    public $NUMBER;
    public $TITLE;
    public $TEXT;
    
    public function __construct($adapter)
    {
        parent::__construct($adapter);
        $this->setTableName('help');
    }
}