<?php
declare(strict_types=1);

namespace App;

class UniversityInformationProcessor
{
    private UniversityAPI $universitySearch;

    public function __construct(UniversityAPI $universitySearch)
    {
        $this->universitySearch = $universitySearch;
    }

    public function processUserInput(): UniversityCollection
    {
        $country = trim(readline("Enter country: "));
        if (empty($country)) {
            exit("Search conditions cannot be empty.\n");
        }
        return $this->universitySearch->getUniversityByCountry($country);
    }

    public function showUniversityDetails(University $university): void
    {
        echo "Name: {$university->getName()}\n";
        echo "Country: {$university->getCountry()}\n";
        echo "Web page: " . implode(", ", $university->getWebPages()) . "\n";
        echo "-------------------------------------------------------------\n";
    }

    public function displayUniversityDetails(UniversityCollection $collection)
    {
        if (empty($collection->getUniversities())) {
            exit("No records found. \n");
        }

        foreach ($collection->getUniversities() as $university) {
            $this->showUniversityDetails($university);
        }
    }
}
