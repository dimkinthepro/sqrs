<?php

declare(strict_types=1);

namespace Dimkinthepro\SqrsBundle\Tests\Command\Fixtures;

use Dimkinthepro\SqrsBundle\Command\CommandInterface;

class CreateBookCommand implements CommandInterface
{
    public function __construct(
        public readonly string $author,
        public readonly \DateTimeImmutable $date
    ) {
    }
}
