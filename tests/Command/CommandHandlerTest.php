<?php

declare(strict_types=1);

namespace Dimkinthepro\SqrsBundle\Tests\Command;

use Dimkinthepro\SqrsBundle\Tests\Command\Fixtures\Book;
use Dimkinthepro\SqrsBundle\Tests\Command\Fixtures\CreateBookCommand;
use Dimkinthepro\SqrsBundle\Tests\Command\Fixtures\CreateBookHandlerCommand;
use PHPUnit\Framework\TestCase;

class CommandHandlerTest extends TestCase
{
    public function testCase(): void
    {
        $handler = new CreateBookHandlerCommand();

        $author = 'John Doe';
        $date = new \DateTimeImmutable();
        $command = new CreateBookCommand($author, $date);

        $newBook = $handler($command);

        self::assertInstanceOf(Book::class, $newBook);
        self::assertEquals($newBook->date, $date);
        self::assertEquals($newBook->author, $author);
    }
}
