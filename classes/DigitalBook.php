<?php

class DigitalBook extends Book
{
    protected string $url;
    protected int $downloadStatistics = 0;

    public function takeBook(Room $room): string
    {
        if (!isset($this->url)) {
            return "Ссылка на скачивание пока не доступна";
        }
        $this->downloadStatistics++;
        return "Электронное издание можно скачать по адресу: " . $this->url;
    }

    public function getUrl(): string
    {
        if (!isset($this->url)) {
            return "Уточните ссылку на скачивание у администратора библиотеки";
        }
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getInfo(): string
    {
        return "Электронное издание: '" . $this->name . "' Авторы: " . $this->getAuthors() .
            " Год выпуска: " . $this->yearOfIssue;
    }

    public function getStatistics(): string
    {
        return "Электронное издание '" . $this->name . "' скачивали " . $this->downloadStatistics . " раз";
    }
}
