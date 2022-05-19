<?php

declare(strict_types=1);

namespace Dimkinthepro\SQRS\Command;

interface CommandHandlerInterface
{
    /**
     * @param CommandInterface $command
     */
    public function __invoke(mixed $command): mixed;
}
