<?php

/* 1. Придумать класс, который описывает любую сущность из предметной области интернет-магазинов: продукт, ценник, посылка и т.п.
2. Описать свойства класса из п.1 (состояние).
3. Описать поведение класса из п.1 (методы).
4. Придумать наследников класса из п.1. Чем они будут отличаться? */



class Product
{
    public $id;
    public $title;
    public $description;
    public $price;

    public function __construct($id, $title, $description, $price)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
    }

    public function view()
    {
        echo "
            <hr><h2>Карточка товара</h2>
            <b>id:</b> $this->id<br>
            <b>Наименование:</b> $this->title<br>
            <b>Описание:</b> $this->description<br>
            <b>Цена:</b> $this->price руб.<br>
        ";
    }
}

class Cart extends Product {
    public $count; 

    public function __construct($id, $title, $description, $price, $count)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->count = $count;
    }

    public function view()
    {
        echo "
            <hr><h2>Товары в корзине: </h2>
            <b>id:</b> $this->id<br>
            <b>Наименование:</b> $this->title<br>
            <b>Описание:</b> $this->description<br>
            <b>Цена:</b> $this->price руб.<br>
            <b>Количество:</b> $this->count шт.<br>
        ";
    }
}

$good1 = new Product(1, 'Мышка', 'Компьютерная мышка', 500);
$good1->view();

$good2 = new Cart(2, 'Монитор', 'Samsung', 10000, 2);
$good2->view();

/* 5. Дан код:
Что он выведет на каждом шаге? Почему? */

class A {
    public function foo() {
    static $x = 0;
    echo ++$x;
        }
    }
    $a1 = new A();
    $a2 = new A();
    $a1->foo(); //1
    $a2->foo(); //2
    $a1->foo(); //3
    $a2->foo(); //4

/* Переменная x является статичной и принадлежит классу, 
а не его экземплярам поэтому она увеличивается на единицу при каждом вызове метода класса*/

/* 6. Немного изменим п.5
Объясните результаты в этом случае. */

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
    $a1->foo(); // 1
    $b1->foo(); // 1
    $a1->foo(); // 2
    $b1->foo(); // 2

/* Класс B наследуется от класса А. В первый раз мы вызываем метод экземпляра класса А, получаем 1.
Второй раз мы вызываем метод экземпляра B, поэтому опять получаем 1. В третьем и четвертом случае 
получаем 2, так как повторно вызываем статические методы классов А и B */

/* 7. * Дан код:
Что он выведет на каждом шаге? Почему? */

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
        }
    }
    class B extends A {
    }
    $a1 = new A; 
    $b1 = new B;
    $a1->foo(); //1
    $b1->foo(); //1
    $a1->foo(); //2
    $b1->foo(); //2

/* так как экземпляр класса создается без аргументов, допускается не ставить скобки. 
В  остальном код такой же, какв пункте 6 */


    
    