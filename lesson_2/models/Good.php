<?php
namespace App\models;

class Good extends Model
{
    public $id;
    public $name;
    public $price;
    public $count;

    public function getTableName(): string
    {
        return 'goods';
    }

}