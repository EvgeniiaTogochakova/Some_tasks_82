<?php

//class A
//{
//    public function foo()
//    {
//        static $x = 0;
//        echo ++$x;
//    }
//}
//
//$a1 = new A();
//$a2 = new A();
//$a1->foo(); // Выведет 1
//$a2->foo(); // Выведет 2
//$a1->foo(); // Выведет 3
//$a2->foo(); // Выведет 4

// В данном случае слово static значает статичскую область видимости.
// Переменная сохраняет свое значение между вызовами функции.
// Всякий раз вызывая функцию, неважно, из каких классов, получим увеличение на 1.


class A
{
    public function foo()
    {
        static $x = 0;
        echo ++$x;
    }
}

class B extends A
{
}

$a1 = new A();
$b1 = new B();
$a1->foo(); // Выведет 1
$b1->foo(); // Выведет 2
$a1->foo(); // Выведет 3
$b1->foo(); // Выведет 4

// Опять же неважно, класс-родитель ли вызывает эту функцию или класс-наследник,
// переменная сохраняет свое значение между вызывами функции благодаря static.