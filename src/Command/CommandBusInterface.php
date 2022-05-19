<?php

declare(strict_types=1);

namespace Dimkinthepro\SqrsBundle\Command;

interface CommandBusInterface
{
    public function execute(CommandInterface $command): mixed;
}
