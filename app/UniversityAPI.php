<?php

declare(strict_types=1);

namespace App;
class UniversityAPI
{
    private string $apiUrl = "http://universities.hipolabs.com/search?country=";

    public function __construct(string $apiUrl = null)
    {
        if ($apiUrl) {
            $this->apiUrl = $apiUrl;
        }
    }

    public function getUniversityByCountry(string $country): UniversityCollection
    {
        $url = $this->apiUrl . urlencode($country);
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        $universityCollection = new UniversityCollection;

        foreach ($data as $universityData) {
            $university= new University(
                $universityData->name,
                $universityData->country,
                $universityData->web_page
            );
            $universityCollection-add($university);
        }

        return $universityCollection;

    }


}
