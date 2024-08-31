<?php
require_once "classes/Book.php";
require_once "classes/PaperBook.php";
require_once "classes/DigitalBook.php";
require_once "classes/Bookcase.php";
require_once "classes/Room.php";

$roomPushkin = new Room("Библиотека имени А.С.Пушкина", "ул.Пушкина, 80");
$roomPushkin2 = new Room("Библиотека имени А.С.Пушкина, филиал № 10", "ул.Первопрестольная, 17a");
echo $roomPushkin->getInfo() . PHP_EOL;
$bookcaseFiction100 = new Bookcase("Fiction100", $roomPushkin);
echo $bookcaseFiction100->getInfo() . PHP_EOL;
$bookcaseFiction100->changeLocation($roomPushkin2);
echo $bookcaseFiction100->getInfo() . PHP_EOL;
echo $roomPushkin2->getBookcasesInRoom() . PHP_EOL;
echo $bookcaseFiction100->getBooksList() . PHP_EOL;
$book1 = new PaperBook("Gone With the Wind", ["Margaret Mitchell"], 1936, "1936MMG");
$book2 = new PaperBook("The Thorn Birds", ["Colleen McCullough"], 1977, "1977MCT");
$bookcaseFiction100->addBook($book1);
$bookcaseFiction100->addBook($book2);
echo $bookcaseFiction100->getBooksList() . PHP_EOL;
echo $book1->getBookcase() . PHP_EOL;
echo $book1->takeBook($roomPushkin2) . PHP_EOL;
echo $bookcaseFiction100->getBooksList() . PHP_EOL;
echo $bookcaseFiction100->seeTakenBooksList() . PHP_EOL;
echo $book1->getStatistics() . PHP_EOL;
echo $book1->returnBook($roomPushkin) . PHP_EOL;
echo $book1->returnBook($roomPushkin2) . PHP_EOL;
echo $bookcaseFiction100->getBooksList() . PHP_EOL;
echo $book1->removeBook($roomPushkin) . PHP_EOL;
echo $book1->removeBook($roomPushkin2) . PHP_EOL;

$ebook = new DigitalBook("PHP Objects, Patterns, and Practice: 5th edition", ["Matt Zandstra"], 2016,);
echo $ebook->getInfo() . PHP_EOL;
echo $ebook->getUrl() . PHP_EOL;
$ebook->setUrl('example.com/download/ebooks/phpobjects5');
echo $ebook->takeBook($roomPushkin2) . PHP_EOL;
echo $ebook->getStatistics() . PHP_EOL;
