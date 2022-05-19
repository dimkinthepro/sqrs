<?php

declare(strict_types=1);

namespace Dimkinthepro\SqrsBundle\Tests\Query;

use Dimkinthepro\SqrsBundle\Tests\Query\Fixtures\Book;
use Dimkinthepro\SqrsBundle\Tests\Query\Fixtures\GetBookQuery;
use Dimkinthepro\SqrsBundle\Tests\Query\Fixtures\GetBookQueryHandler;
use PHPUnit\Framework\TestCase;

class QueryHandlerTest extends TestCase
{
    /** @dataProvider providerTestCase */
    public function testCate(string $author, bool $assertion): void
    {
        $handler = new GetBookQueryHandler();
        $command = new GetBookQuery($author);

        $book = $handler($command);
        if (false === $assertion) {
            self::assertNull($book);
        } else {
            self::assertInstanceOf(Book::class, $book);
            self::assertEquals($book->author, $author);
        }
    }

    public function providerTestCase(): array
    {
        return [
            'success' => ['Doe John', true],
            'false' => ['John Doe', false],
        ];
    }
}
