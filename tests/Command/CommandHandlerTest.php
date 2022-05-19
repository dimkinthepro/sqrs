<?php

declare(strict_types=1);

namespace Dimkinthepro\SqrsBundle\Tests\Command;

use Dimkinthepro\SqrsBundle\Command\CommandBus;
use Dimkinthepro\SqrsBundle\Command\CommandBusInterface;
use Dimkinthepro\SqrsBundle\Tests\Command\Fixtures\Book;
use Dimkinthepro\SqrsBundle\Tests\Command\Fixtures\CreateBookCommand;
use Dimkinthepro\SqrsBundle\Tests\Command\Fixtures\CreateBookHandlerCommand;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Messenger\Handler\HandlersLocator;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\Middleware\HandleMessageMiddleware;

class CommandHandlerTest extends TestCase
{
    public function testCase(): void
    {
        $commandBus = $this->createCommandBus();

        $author = 'John Doe';
        $date = new \DateTimeImmutable();
        $command = new CreateBookCommand($author, $date);

        $newBook = $commandBus->execute($command);

        self::assertInstanceOf(Book::class, $newBook);
        self::assertEquals($newBook->date, $date);
        self::assertEquals($newBook->author, $author);
    }

    private function createCommandBus(): CommandBusInterface
    {
        $handler = new CreateBookHandlerCommand();

        $messageBus = new MessageBus([
            new HandleMessageMiddleware(new HandlersLocator([
                CreateBookCommand::class => [$handler],
            ])),
        ]);

        return new CommandBus($messageBus);
    }
}
