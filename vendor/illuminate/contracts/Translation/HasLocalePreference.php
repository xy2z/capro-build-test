<?php

namespace _PhpScoper5e9ecd738c28\Illuminate\Contracts\Translation;

interface HasLocalePreference
{
    /**
     * Get the preferred locale of the entity.
     *
     * @return string|null
     */
    public function preferredLocale();
}
