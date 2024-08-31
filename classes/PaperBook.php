<?php

class PaperBook extends Book
{
    protected string $libCode;
    protected Bookcase $bookcase;
    protected int $readingStatistics = 0;

    public function __construct(string $name, array $authors, int $yearOfIssue, string $libCode)
    {
        parent::__construct($name, $authors, $yearOfIssue);
        $this->libCode = $libCode;
    }

    public function getBookcase(): string
    {
        if (!isset($this->bookcase)) return "Шкаф для книги '" . $this->name . "' пока не определен";
        return "Шкаф для книги '" . $this->name . "' - " . $this->bookcase->getInfo();
    }

    public function setBookcase(Bookcase $bookcase): void
    {
        $this->bookcase = $bookcase;
    }

    public function takeBook(Room $room): string
    {
        if ($this->bookcase->findBookInThisBookcase($this) && ($room->findBookcaseInThisRoom($this->bookcase))) {
            $this->readingStatistics++;
            $this->bookcase->takeBook($this);
            return "Книгy '" . $this->name . "' взяли почитать из библиотеки " . $room->getName();
        }

        return "Книги '" . $this->name . "' в библиотеке " . $room->getName() . " нет";
    }

    public function returnBook(Room $room): string
    {
        if ($this->bookcase->findBookInTakenBooks($this) && $room->findBookcaseInThisRoom($this->bookcase)) {
            $this->bookcase->returnBook($this);
            return "Спасибо за возврат " . $this->name . " в библиотеку " . $room->getName();
        }
        return "Извините, уточните, в какой библиотеке вы брали книгу";

    }

    public function removeBook(Room $room): string
    {
        if ($this->bookcase->findBookInThisBookcase($this) && $room->findBookcaseInThisRoom($this->bookcase)) {
            $this->bookcase->removeBook($this);
            return "Книга '" . $this->name . "' списана из библиотеки " . $room->getName();
        }
        return "Книги '" . $this->name . "' в библиотеке " . $room->getName() . " нет, списать невозможно";

    }

    public function getInfo(): string
    {
        return "Книга: '" . $this->name . "' Авторы: " . $this->getAuthors() .
            " Год выпуска: " . $this->yearOfIssue . " Код: " . $this->libCode;
    }

    public function getStatistics(): string
    {
        return "Книгу '" . $this->name . "' читали " . $this->readingStatistics . " раз";
    }
}
