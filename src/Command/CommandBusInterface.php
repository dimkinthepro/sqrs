<?php

declare(strict_types=1);

namespace Dimkinthepro\SQRS\Command;

interface CommandBusInterface
{
    public function execute(CommandInterface $command): mixed;
}
