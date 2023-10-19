<?php
declare(strict_types=1);

namespace App;
class UniversityCollection
{
    private array $universities;

    public function __construct(array $universities = [])
    {
        /*foreach ($universities as $university)
        {
            $this->add($university);
        }*/
        $this->universities = $universities;
    }

    public function getUniversities(): array
    {
        return $this->universities;
    }

    public function add(University $university)
    {
        $this->universities[] = $university;
    }

}
