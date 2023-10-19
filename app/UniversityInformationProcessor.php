<?php
declare(strict_types=1);

namespace App;

class UniversityInformationProcessor
{
    private UniversityAPI  $universitySearch;
    public function __construct(UniversityAPI  $universitySearch)
    {
        $this->universitySearch = $universitySearch;
    }

    public function processUserInput(): UniversityCollection
    {
        $country = trim(readline("Enter country: "));
        return $this->universitySearch->getUniversityByCountry($country);
    }

    public function showUniversityDetails(University $university): void
    {
        echo "Name: " . $university->getName() . PHP_EOL;
        echo "Country: " . $university->getCountry() . PHP_EOL;
        echo "Web page: " . implode(", ", $university->getWebPages()) . PHP_EOL;
        echo "-------------------------------------------------------------" . PHP_EOL;
    }
}
