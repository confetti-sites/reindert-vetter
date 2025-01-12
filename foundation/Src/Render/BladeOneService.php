<?php

declare(strict_types=1);

namespace Foundation\Render;

class BladeOneService implements RenderInterface
{

    public function __construct(
        private readonly string $repository,
        private readonly string $cacheDir,
    )
    {
    }

    public function isCapable(string $uri): bool
    {
        return true;
    }

    /**
     * @throws \Exception
     */
    public function renderByUrl(string $uri): string
    {
        return (new \Bootstrap\Bootstrap($this->repository, $this->cacheDir))->boot();
    }

    public function renderByView(string $view, $variables = []): string
    {
        $driver = new BladeOne($this->repository, $this->cacheDir, BladeOne::MODE_DEBUG);
        $driver->includeScope=false;

        return $driver->run($view, $variables);
    }
}
