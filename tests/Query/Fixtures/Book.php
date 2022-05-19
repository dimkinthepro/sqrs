<?php

declare(strict_types=1);

namespace Dimkinthepro\SqrsBundle\Tests\Query\Fixtures;

class Book
{
    public string $author;
    public \DateTimeImmutable $date;

    public function __construct()
    {
        $this->author = 'Doe John';
        $this->date = new \DateTimeImmutable();
    }
}
