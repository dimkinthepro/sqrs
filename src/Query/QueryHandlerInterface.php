<?php

declare(strict_types=1);

namespace Dimkinthepro\SQRS\Query;

interface QueryHandlerInterface
{
    /**
     * @param QueryInterface $query
     */
    public function __invoke(mixed $query): QueryResultDtoInterface;
}
