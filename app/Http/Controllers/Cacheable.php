<?php

namespace App\Http\Controllers;

interface Cacheable
{
    /**
     *
     * @return string
     */
    public function cacheTags();
}
