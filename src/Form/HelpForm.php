<?php
namespace Help\Form;

use Components\Form\AbstractBaseForm;
use Laminas\Form\Element\Text;
use Laminas\Form\Element\Textarea;

class HelpForm extends AbstractBaseForm
{
    public function init()
    {
        parent::init();
        
        $this->add([
            'name' => 'NUMBER',
            'type' => Text::class,
            'attributes' => [
                'id' => 'NUMBER',
                'class' => 'form-control',
                'required' => 'true',
            ],
            'options' => [
                'label' => 'Number',
            ],
        ],['priority' => 100]);
        
        $this->add([
            'name' => 'TITLE',
            'type' => Text::class,
            'attributes' => [
                'id' => 'TITLE',
                'class' => 'form-control',
                'required' => 'true',
            ],
            'options' => [
                'label' => 'Title',
            ],
        ],['priority' => 100]);
        
        $this->add([
            'name' => 'ICON',
            'type' => Text::class,
            'attributes' => [
                'id' => 'ICON',
                'class' => 'form-control',
                'required' => 'true',
            ],
            'options' => [
                'label' => 'Icon',
            ],
        ],['priority' => 100]);
        
        $this->add([
            'name' => 'TEXT',
            'type' => Textarea::class,
            'attributes' => [
                'id' => 'TEXT',
                'class' => 'form-control',
                'required' => 'true',
            ],
            'options' => [
                'label' => 'Text',
            ],
        ],['priority' => 100]);
    }
}