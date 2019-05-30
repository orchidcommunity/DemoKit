<?php

namespace Orchids\DemoKit\Http\Layouts\Step6;


class AjaxWidget
{

/**
* @var null
*/
public $query = null;

/**
* @var null
*/
public $key = null;

/**
* @return array
*/
public function handler()
{
    $data = [
    [
    'id'   => 1,
    'text' => 'Запись 1',
    ],
    [
    'id'   => 2,
    'text' => 'Запись 2',
    ],
    [
    'id'   => 3,
    'text' => 'Запись 3',
    ],
    ];

    if(!is_null($this->key)) {
    foreach ($data as $key => $result) {

    if ($result['id'] === intval($this->key)) {
    return $data[$key];
    }
    }
    }

    return $data;

}

}