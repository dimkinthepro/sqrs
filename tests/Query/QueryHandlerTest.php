<?php

declare(strict_types=1);

namespace Dimkinthepro\SqrsBundle\Tests\Query;

use Dimkinthepro\SqrsBundle\Query\QueryBus;
use Dimkinthepro\SqrsBundle\Query\QueryBusInterface;
use Dimkinthepro\SqrsBundle\Tests\Query\Fixtures\Book;
use Dimkinthepro\SqrsBundle\Tests\Query\Fixtures\GetBookQuery;
use Dimkinthepro\SqrsBundle\Tests\Query\Fixtures\GetBookQueryHandler;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Messenger\Handler\HandlersLocator;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\Middleware\HandleMessageMiddleware;

class QueryHandlerTest extends TestCase
{
    /** @dataProvider providerTestCase */
    public function testCate(string $author, bool $assertion): void
    {
        $queryBus = $this->createQueryBus();
        $command = new GetBookQuery($author);

        $book = $queryBus->execute($command);
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

    private function createQueryBus(): QueryBusInterface
    {
        $handler = new GetBookQueryHandler();

        $messageBus = new MessageBus([
            new HandleMessageMiddleware(new HandlersLocator([
                GetBookQuery::class => [$handler],
            ])),
        ]);

        return new QueryBus($messageBus);
    }
}
