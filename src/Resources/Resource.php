<?php

namespace Manggala\UniversalPanel\Resources;

use Manggala\UniversalPanel\Contracts\ResourceInterface;
use Illuminate\Support\Str;

abstract class Resource implements ResourceInterface
{
    protected static ?string $model = null;
    protected static ?string $navigationIcon = 'FileText';
    protected static ?string $navigationGroup = 'General';
    protected static ?string $label = null;
    protected static ?string $slug = null;

    public static function getModel(): string
    {
        return static::$model ?? '';
    }

    public static function getNavigationIcon(): string
    {
        return static::$navigationIcon ?? 'FileText';
    }

    public static function getNavigationGroup(): string
    {
        return static::$navigationGroup ?? 'General';
    }

    public static function getLabel(): string
    {
        if (static::$label) {
            return static::$label;
        }

        $className = class_basename(static::class);
        return Str::headline(Str::before($className, 'Resource'));
    }

    public static function getSlug(): string
    {
        if (static::$slug) {
            return static::$slug;
        }

        return Str::kebab(Str::plural(static::getLabel()));
    }

    public static function table(): array
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'created_at' => 'Created At',
        ];
    }
}
