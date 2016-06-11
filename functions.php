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

if (!function_exists('location')) {

    /**
     * Create a new Location instace.
     *
     * @param null $latitude
     * @param null $longitude
     *
     * @return Wazoomie\Support\Location
     */
    function location($latitude = null, $longitude = null)
    {
        return app()->make('Wazoomie\Support\Location', [$latitude, $longitude]);
    }
}