<h1>Properties</h1><?php

class Test
{
    const CONSTANT = '_';
    public $variable1;
    protected $variable2 = self::CONSTANT;
    private $variable3;
    var $variable4 = <<<VAR4
Some text
VAR4;

}

class ExtendedTest extends Test
{

}

var_dump(new Test());
br();
br();
var_dump(new ExtendedTest());