<h1>Constructors and Destructors</h1><?php


class ParentClass
{
    function __construct()
    {
        echo 'Class ' . self::class . ' constructor triggered <br>';
    }

    function __destruct()
    {
        // throw new Exception(''); // causes fatal error
        echo 'Class ' . static::class . ' object destroyed <br>';
    }
}

class DelayedDestroy
{
    function __destruct()
    {
        echo 'Class ' . static::class . ' object destroyed on script end 
            before output HTML formed and sent to browser after HTTP headers sent<br>';
    }
}

class Child extends ParentClass
{
    public function __construct()
    {
        echo 'Class ' . self::class . ' constructor triggered  and calls parent one<br>';
        parent::__construct();
    }

    function __destruct()
    {
        echo 'Class ' . static::class . ' object destroyed and calls parent one<br>';
        parent::__destruct();
    }


}

class ChildNoParentEcho extends ParentClass
{

}

new ParentClass;
br();
new Child;
br();
new ChildNoParentEcho;

if((float)substr(PHP_VERSION, 0 , 3) < 7.2)
{
    br();
    br();
    class DeprecatedConstructor
    {
        public function DeprecatedConstructor()
        {
            echo "This is deprecated and will be deleted in further versions";
        }
    }

    new DeprecatedConstructor();
}

$a = new DelayedDestroy;
$b = new DelayedDestroy;
$c = new DelayedDestroy;