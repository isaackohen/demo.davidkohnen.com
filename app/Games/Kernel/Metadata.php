<?php

namespace App\Games\Kernel;

abstract class Metadata
{
    abstract public function id() : string;

    abstract public function name() : string;

    /**
     * @see Icon.vue
     * @return string icon name or image (third-party games)
     */
    abstract public function icon() : string;

    /**
     * @return array of categories
     * @since 3.3.0
     */
    abstract public function category() : array;

    /**
     * If this returns true, then this game shouldn't appear anywhere in admin panel, will be disabled,
     * and users will see "Coming soon!" label instead of "Unavailable".
     * @return bool
     */
    public function isPlaceholder(): bool
    {
        return false;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id(),
            'name' => $this->name(),
            'icon' => $this->icon(),
            'category' => $this->category(),
        ];
    }
}
