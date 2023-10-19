<?php
declare(strict_types=1);

require_once 'vendor/autoload.php';

use App\UniversityAPI;
use App\UniversityInformationProcessor;

$api = new UniversityAPI();
$processor = new UniversityInformationProcessor($api);

$collection = $processor->processUserInput();

if (empty($collection->getUniversities())) {
    exit("No records found. \n");
}

foreach ($collection->getUniversities() as $university) {
    $processor->showUniversityDetails($university);
}