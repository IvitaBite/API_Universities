<?php

declare(strict_types=1);

namespace App;
class University
{
    private string $name;
    private string $country;
    private array $webPages;

    public function __construct(
        string $name,
        string $country,
        array $webPages)
    {
        $this->name = $name;
        $this->country = $country;
        $this->webPages = $webPages;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getWebPages(): array
    {
        return $this->webPages;
    }

/*    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setCountry(string $country)
    {
        $this->country = $country;
    }

    public function setWebPage(array $webPage)
    {
        $this->webPage = $webPage;
    }*/

}