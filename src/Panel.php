<?php

namespace Manggala\UniversalPanel;

use Manggala\UniversalPanel\Contracts\ResourceInterface;

class Panel
{
    /** @var array<string, class-string<ResourceInterface>> */
    protected array $resources = [];
    protected string $id = 'admin';
    protected string $path = 'admin';
    protected string $title = 'Universal Panel';
    protected ?string $role = null;
    protected string $stack = 'blade';
    protected array $colors = [
        'primary' => '#2271b1',
    ];

    public static function make(string $id = 'admin'): static
    {
        $panel = new static();
        $panel->id($id);
        $panel->path($id);
        
        if ($id === 'superadmin') {
            $panel->title('Superadmin Panel');
            $panel->role('Superadmin');
        }

        /** @var PanelManager $manager */
        $manager = app('universal-panel');
        $manager->registerPanel($panel);

        return $panel;
    }

    public function id(string $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function path(string $path): static
    {
        $this->path = trim($path, '/');
        return $this;
    }

    public function title(string $title): static
    {
        $this->title = $title;
        return $this;
    }

    public function role(?string $role): static
    {
        $this->role = $role;
        return $this;
    }

    public function colors(array $colors): static
    {
        $this->colors = array_merge($this->colors, $colors);
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

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function getColors(): array
    {
        return $this->colors;
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
