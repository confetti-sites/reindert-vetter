<?php

declare(strict_types=1);

namespace ConfettiCMS\Foundation\Contracts;

interface SelectFileInterface
{
    /**
     * @return \Confetti\Components\Map[]
     */
    public function getOptions(): array;
}