<?php

class Room
{
    protected string $name;
    protected string $address;
    protected array $bookcases;

    public function __construct(string $name, string $address, array $bookcases = [])
    {
        $this->name = $name;
        $this->address = $address;
        $this->bookcases = $bookcases;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getInfo(): string
    {
        return $this->name . " находится по адресу " . $this->address;
    }

    public function addBookcase(Bookcase $bookcase): void
    {
        $this->bookcases[] = $bookcase;
    }

    public function getBookcasesInRoom(): string
    {
        if (!$this->bookcases) return $this->name . " пока не заполнена";
        $list = $this->name . " заполнена шкафами: ";
        foreach ($this->bookcases as $bookcase) {
            $list .= $bookcase->getCode() . " ";
        }
        return $list;
    }

    public function findBookcaseInThisRoom(Bookcase $bookcase): bool
    {
        return in_array($bookcase, $this->bookcases);
    }

}
