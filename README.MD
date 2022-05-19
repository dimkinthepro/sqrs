# SQRS Library for Symfony

## 1. Installation:
```bash
composer require dimkinthepro/sqrs
```

### update "config/services.yaml"
```yaml
services:
    #...
    _instanceof:
      Dimkinthepro\SQRS\Command\CommandHandlerInterface:
        tags:
          - { name: messenger.message_handler, bus: command.bus }

      Dimkinthepro\SQRS\Query\QueryHandlerInterface:
        tags:
          - { name: messenger.message_handler, bus: query.bus }
    #...
```

### update "config/packages/messenger.yaml":

```yaml
framework:
    messenger:
        default_bus: query.bus
        buses:
            command.bus:
                middleware:
                    - doctrine_transaction
            query.bus:
#...
```

## 2. Usage example:
1) Create command
```php
# src/Command/CreateBook/CreateBookCommand.php
<?php

declare(strict_types=1);

namespace App\Command\CreateBook;

use Dimkinthepro\SQRS\Command\Command\CommandInterface;

class CreateBookCommand implements CommandInterface
{
    public function __construct(
        public readonly string $author,
        public readonly \DateTimeImmutable $year
    ) {
    }
}
```

2. Create handler
```php
# src/Command/CreateBook/CreateBookCommandHandler.php
<?php

declare(strict_types=1);

namespace App\Command\CreateBook;

use App\Domain\Entity\Book;
use App\Domain\Repository\BookRepositoryInterface;
use Dimkinthepro\SQRS\Command\Command\CommandHandlerInterface;

class CreateBookCommandHandler implements CommandHandlerInterface
{
    public function __construct(
        private readonly BookRepositoryInterface $bookRepository
    ) {
    }

    public function __invoke(CreateBookCommand $command): Book
    {
        $book = new Book();
        $book->setAuthor = $command->author
        $book->setYear = $command->year
        
        $this->bookRepository->add($book);

        return $book;
    }
}
```
