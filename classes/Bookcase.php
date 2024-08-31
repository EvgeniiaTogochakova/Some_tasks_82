<?php

class Bookcase
{
    protected string $code;
    protected string $location;
    protected array $books;
    protected array $takenBooks;

    public function __construct(string $code, Room $room, array $books = [])
    {
        $this->code = $code;
        $this->location = $room->getAddress();
        $this->books = $books;
    }

    public function getCode(): string
    {
        return $this->code;
    }


    public function changeLocation(Room $newRoom): void
    {
        $this->location = $newRoom->getAddress();
        $newRoom->addBookcase($this);
    }


    public function addBook(PaperBook $book): void
    {
        $this->books[] = $book;
        $book->setBookcase($this);
    }

    public function takeBook(PaperBook $book): void
    {
        for ($i = 0; $i < count($this->books); $i++) {
            if ($this->books[$i]->getName() === $book->getName()) {
                array_splice($this->books, $i, 1);
                $this->takenBooks[] = $book;
            }
        }
    }

    public function returnBook(PaperBook $book): void
    {
        for ($i = 0; $i < count($this->takenBooks); $i++) {
            if ($this->takenBooks[$i]->getName() === $book->getName()) {
                array_splice($this->takenBooks, $i, 1);
                $this->books[] = $book;
            }
        }
    }

    public function findBookInThisBookcase(PaperBook $book): bool
    {
        return in_array($book, $this->books);
    }

    public function findBookInTakenBooks(PaperBook $book): bool
    {
        return in_array($book, $this->takenBooks);
    }

    public function removeBook(PaperBook $book): void
    {
        for ($i = 0; $i < count($this->books); $i++) {
            if ($this->books[$i]->getName() === $book->getName()) {
                array_splice($this->books, $i, 1);
            }
        }
    }


    public function seeTakenBooksList(): string
    {
        if (count($this->takenBooks) < 1) {
            return "Пока все книги из шкафа " . $this->code . " на месте";
        }
        $takenBooksList = 'В шкафу ' . $this->code . ' ранее лежали такие книги(сейчас их читают): ' . PHP_EOL;
        foreach ($this->takenBooks as $takenBook) {
            $takenBooksList .= "'" . $takenBook->getName() . "' ";
        }
        return $takenBooksList;
    }

    public function getBooksList(): string
    {
        if (count($this->books) < 1) {
            return "Шкаф " . $this->code . " пока не заполнен книгами";
        }
        $booksList = "В шкафу " . $this->code . " лежат такие книги:" . PHP_EOL;
        for ($i = 0; $i < count($this->books); $i++) {
            $iCorrected = $i + 1;
            $booksList .= $iCorrected . "." . $this->books[$i]->getInfo() . PHP_EOL;
            if ($i === count($this->books) - 1) {
                $booksList = mb_substr($booksList, 0, -2);
            }
        }
        return $booksList;
    }

    public function getInfo(): string
    {
        return "Книжный шкаф: код " . $this->code . " находится в библиотеке по адресу: " . $this->location;
    }
}
