<?php

declare(strict_types=1);

namespace Dimkinthepro\SqrsBundle\Tests\Query\Fixtures;

use Dimkinthepro\SqrsBundle\Query\QueryHandlerInterface;

class GetBookQueryHandler implements QueryHandlerInterface
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
