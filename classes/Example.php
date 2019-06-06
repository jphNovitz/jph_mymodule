<?php

class Example extends ObjectModel
{
    public $id;
    public $name;
    public static $definition = [
        'table' => 'example',
        'primary' => 'id_example',
        'multilang' => false,
        'fields' => [
            'name' => ['type' => self::TYPE_STRING, 'size' => 255, 'required' => true],
        ]
    ];
}