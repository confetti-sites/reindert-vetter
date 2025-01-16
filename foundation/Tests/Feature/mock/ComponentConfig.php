<?php

declare(strict_types=1);

use Confetti\Helpers\Decoration;

class ComponentConfig
{
    /**
     * @param Decoration[] $decorations
     */
    public static function new(
        string      $name,
        array       $decorations,
        string|bool $contentOfFakeMethod
    ): void
    {
        if ($contentOfFakeMethod === false) {
            throw new RuntimeException(
                'Probably you want to get the content of the file, but the file does not exist: contentOfFakeMethod is false.',
            );
        }
        try {
            echo json_encode([
                'name'                   => $name,
                'decorations'            => $decorations,
                'content_of_fake_method' => $contentOfFakeMethod,
            ], JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            throw new RuntimeException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
