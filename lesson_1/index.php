<?php

// 1. Придумать класс,
// который описывает любую сущность из предметной области интернет-магазинов:
// продукт, ценник, посылка и т.п.
// 2. Описать свойства класса из п.1 (состояние).
// 3. Описать поведение класса из п.1 (методы).


class Product
{

    public $title;
    public $price;

    function __construct($title, $price)
    {
        $this->title = $title;
        $this->price = $price;
    }

    function showInfo()
    {
        echo $this->title, $this->price;
    }
}

class Book extends Product {

    public $author;

    function __construct($title, $price, $author)
    {
        parent::__construct($title, $price);
        $this->author = $author;
    }

}

class NoteBook extends Product {

    public $color;

    function __construct($title, $price, $color)
    {
        parent::__construct($title, $price);

        $this->color = $color;
    }
}

//    5. Дан код:

    class A {
        public function foo() {
            static $x = 0;
            echo ++$x;
        }
    }

    $a1 = new A();
    $a2 = new A();

    $a1->foo();
    $a2->foo();

    $a1->foo();
    $a2->foo();

//    Что он выведет на каждом шаге? Почему?

// 1234

// идет обращение к одной и той же статической переменной

// Немного изменим п.5:
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}

class B extends A {
}

$a1 = new A();
$b1 = new B();

$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();

// 6. Объясните результаты в этом случае.

// класс B - новый класс, расширяющий A
// статическая переменная привязана к классу
// и поэтому идет обращение к разным переменным