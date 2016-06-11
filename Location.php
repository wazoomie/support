<?php

namespace Wazoomie\Support;

class Location
{
    /**
     * @var float
     */
    protected $latitude;

    /**
     * @var float
     */
    protected $longitude;

    public function __construct($latitude = 0, $longitude = 0)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * Set the latitude of the Location.
     *
     * @param $latitude
     *
     * @return $this;
     */
    public function setLatitude($latitude)
    {
        $this->latitude = (float) $latitude;
        return $this;
    }

    /**
     * Get the latitude of the Location.
     *
     * @param int $decimals
     *
     * @return float
     */
    public function getLatitude($decimals = 10)
    {
        return (float) number_format($this->latitude, $decimals);
    }

    /**
     * Get whether the latitude of the Location is set.
     *
     * @return bool
     */
    public function hasLatitude()
    {
        return (bool) $this->latitude;
    }

    /**
     * Set the longitude of the Location.
     *
     * @param $longitude
     *
     * @return $this;
     */
    public function setLongitude($longitude)
    {
        $this->longitude = (float) $longitude;
        return $this;
    }

    /**
     * Get the longitude of the Location.
     *
     * @param int $decimals
     *
     * @return float
     */
    public function getLongitude($decimals = 10)
    {
        return (float) number_format($this->longitude, $decimals);
    }

    /**
     * Get whether the longitude of the Location is set.
     *
     * @return bool
     */
    public function hasLongitude()
    {
        return (bool) $this->longitude;
    }

    /**
     * Get whether the location is set and is valid.
     *
     * @return bool
     */
    public function hasLocation()
    {
        return (boolean) $this->latitude != 0 && $this->longitude != 0;
    }

    /**
     * Increase the latitude and longitude of the Location.
     *
     * @param $latitude
     * @param $longitude
     *
     * @return $this
     */
    public function add($latitude, $longitude)
    {
        $this->latitude += $latitude;
        $this->longitude += $longitude;
        return $this;
    }

    /**
     * Decrease the latitude and longitude of the Location.
     *
     * @param $latitude
     * @param $longitude
     *
     * @return $this
     */
    public function subtract($latitude, $longitude)
    {
        $this->latitude -= $latitude;
        $this->longitude -= $longitude;
        return $this;
    }

    /**
     * Get the distance between the Location and a given Location.
     *
     * @param Location $otherLocation
     *
     * @return float
     */
    public function distance(Location $otherLocation)
    {
        $theta = $this->longitude - $otherLocation->getLongitude();
        $distance = (sin(deg2rad($this->latitude))
            * sin(deg2rad($otherLocation->getLatitude())))
            + (cos(deg2rad($this->latitude))
            * cos(deg2rad($otherLocation->getLatitude()))
            * cos(deg2rad($theta)));
        $distance = acos($distance);
        $distance = rad2deg($distance);

        return (float) $distance * 60 * 1.1515;
    }

    /**
     * Get whether the Location is the same as the given Location.
     *
     * @param Location $otherLocation
     *
     * @return bool
     */
    public function equals(Location $otherLocation)
    {
        return (bool) $this == $otherLocation;
    }
}