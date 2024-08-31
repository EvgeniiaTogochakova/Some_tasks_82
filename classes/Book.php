<?php

abstract class Book
{
    protected string $name;
    protected array $authors;
    protected int $yearOfIssue;

    public function __construct(string $name, array $authors, int $yearOfIssue)
    {
        $this->name = $name;
        $this->authors = $authors;
        $this->yearOfIssue = $yearOfIssue;
    }

    public function getAuthors(): string
    {
        $authorsList = '';
        foreach ($this->authors as $author) {
            $authorsList .= $author . " ";
        }
        return $authorsList;
    }

    public function getName(): string
    {
        return $this->name;
    }

    abstract public function getInfo(): string;

    abstract public function takeBook(Room $room): string;

    abstract public function getStatistics(): string;

}
