<?php

use Phalcon\Mvc\Model;

class Stamp extends Model
{
    public $id;
    public $number;
	public $name;
	public $description;
    public $year;
    public $quantity;
    public $unglued;
}