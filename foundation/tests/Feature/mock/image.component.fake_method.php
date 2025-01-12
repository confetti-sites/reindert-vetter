<?php

declare(strict_types=1);

new class implements ComponentFakeInterface {
    public static function fake(array $arguments): string
    {
        return "https://picsum.photos";
    }
};
