<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

use App\UniversityAPI;
use App\UniversityInformationProcessor;

$apiUrl = "http://universities.hipolabs.com/search?country=";

$api = new UniversityAPI($apiUrl);
$processor = new UniversityInformationProcessor($api);

$collection = $processor->processUserInput();
$processor->displayUniversityDetails($collection);