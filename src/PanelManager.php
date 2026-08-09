<?php

namespace Manggala\UniversalPanel;

use Manggala\UniversalPanel\Contracts\ResourceInterface;

class PanelManager
{
    protected ?Panel $panel = null;
    /** @var array<string, Panel> */
    protected array $panels = [];

    public function registerPanel(Panel $panel): void
    {
        $this->panels[$panel->getId()] = $panel;
        if ($this->panel === null) {
            $this->panel = $panel;
        }
    }

    public function setPanel(Panel $panel): void
    {
        $this->panel = $panel;
        $this->panels[$panel->getId()] = $panel;
    }

    public function getPanel(?string $id = null): Panel
    {
        if ($id !== null && isset($this->panels[$id])) {
            return $this->panels[$id];
        }

        if ($this->panel === null) {
            $this->panel = new Panel();
            $this->panel->stack(config('universal-panel.stack', 'blade'));
            $this->panels[$this->panel->getId()] = $this->panel;
        }

        return $this->panel;
    }

    public function getPanels(): array
    {
        if (empty($this->panels)) {
            $this->getPanel();
        }

        return $this->panels;
    }

    public function make(string $id = 'admin'): Panel
    {
        return Panel::make($id);
    }

    /**
     * @param class-string<ResourceInterface> $resourceClass
     */
    public function registerResource(string $resourceClass): void
    {
        $this->getPanel()->resources([$resourceClass]);
    }

    public function getResources(): array
    {
        return $this->getPanel()->getResources();
    }

    public function getStack(): string
    {
        return $this->getPanel()->getStack();
    }
}
