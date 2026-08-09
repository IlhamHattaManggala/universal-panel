<?php

namespace Manggala\UniversalPanel;

use Manggala\UniversalPanel\Contracts\ResourceInterface;

class Panel
{
    /** @var array<string, class-string<ResourceInterface>> */
    protected array $resources = [];
    protected string $id = 'admin';
    protected string $path = 'admin';
    protected string $stack = 'react';

    public function id(string $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function path(string $path): static
    {
        $this->path = $path;
        return $this;
    }

    public function stack(string $stack): static
    {
        $this->stack = $stack;
        return $this;
    }

    /**
     * @param array<class-string<ResourceInterface>> $resources
     */
    public function resources(array $resources): static
    {
        foreach ($resources as $resource) {
            $this->resources[$resource::getSlug()] = $resource;
        }

        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getStack(): string
    {
        return $this->stack;
    }

    public function getResources(): array
    {
        return $this->resources;
    }
}
