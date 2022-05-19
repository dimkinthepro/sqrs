<?php

declare(strict_types=1);

namespace Dimkinthepro\SqrsBundle\Tests\Query\Fixtures;

use Dimkinthepro\SqrsBundle\Query\QueryInterface;

class GetBookQuery implements QueryInterface
{
    public function __construct(
       public readonly string $author
    ) {
    }
}
