<?php

declare(strict_types=1);

namespace Dimkinthepro\SqrsBundle\Tests\Query\Fixtures;

class GetBookQueryHandler
{
    public function __invoke(GetBookQuery $query): ?Book
    {
        $books = [new Book()];

        foreach ($books as $book) {
            if ($book->author === $query->author) {
                return $book;
            }
        }

        return null;
    }
}
