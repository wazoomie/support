<?php

if (!function_exists('stringbuilder')) {

    /**
     * Create a new StringBuilder instance.
     *
     * @return Wazoomie\Support\StringBuilder;
     */
    function stringbuilder($segment = null)
    {
        return app()->make('Wazoomie\Support\StringBuilder', (array) $segment);
    }
}