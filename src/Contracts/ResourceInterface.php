<?php

namespace Manggala\UniversalPanel\Contracts;

interface ResourceInterface
{
    public static function getModel(): string;
    public static function getNavigationIcon(): string;
    public static function getNavigationGroup(): string;
    public static function getSlug(): string;
    public static function getLabel(): string;
    public static function table(): array;
}
