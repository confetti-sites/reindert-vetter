<?php

declare(strict_types=1);

namespace ConfettiCMS\Foundation\Contracts;

interface SelectModelInterface
{
    /**
     * @return \Confetti\Components\Map|\Confetti\Model\RawFile|null Return type is mixed
     *         because the return value will be narrowed down in the parent class.
     */
    public function getSelected(): mixed;
}