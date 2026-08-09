<?php

namespace Manggala\UniversalPanel;

use Manggala\UniversalPanel\Contracts\ResourceInterface;

class PanelManager
{
    protected ?Panel $panel = null;

    public function setPanel(Panel $panel): void
    {
        $this->panel = $panel;
    }

    public function getPanel(): Panel
    {
        if ($this->panel === null) {
            $this->panel = new Panel();
            $this->panel->stack(config('universal-panel.stack', 'react'));
        }

        return $this->panel;
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
