<?php

namespace App\Admin\Traits;
use App;

/**
 * @deprecated
 */
trait LanguageSet
{
    /**
     * @param \Closure $callback
     *
     * @return Grid
     */
    public function setLanguage()
    {
        $locale = str_replace('/', '', request()->route()->getPrefix());
        App::setLocale($locale);
        return $locale;
    }
}