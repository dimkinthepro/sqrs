<?php

declare(strict_types=1);

namespace Dimkinthepro\SqrsBundle\Query;

interface QueryBusInterface
{
    public function execute(QueryInterface $query): mixed;
}
