<?php

declare(strict_types=1);

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class UniversityAPI
{
    private string $apiUrl;
    private Client $http;

    public function __construct(string $apiUrl)
    {
        $this->apiUrl = $apiUrl;
        $this->http = new Client();

    }

    public function getUniversityByCountry(string $country): ?UniversityCollection
    {
        $url = $this->apiUrl . urlencode($country);

        try {
            $response = $this->http->get($url);
        } catch (GuzzleException $e) {
            // Handle the exception, e.g., log the error or show a user-friendly message.
            echo "GuzzleException: " . $e->getMessage() . "\n";
            // Return null or handle the error gracefully
            return null;
        }

        $data = json_decode($response->getBody()->__toString(), true);

        if ($data === false) {
            echo "Error: JSON decoding failed. The response body could not be decoded as JSON.";
            return null;
        }

        if ($data === null) {
            echo "Error: JSON decoding returned null. The response body may not be valid JSON.";
            return null;
        }

        $universityCollection = new UniversityCollection();

        foreach ($data as $universityData) {
            $university = new University(
                $universityData["name"],
                $universityData["country"],
                $universityData["web_pages"]
            );
            $universityCollection->add($university);
        }
        return $universityCollection;

    }
}
