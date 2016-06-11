<?php

namespace Wazoomie\Support\Contracts;

interface FactoryInterface
{
    /**
     * Set the attributes.
     *
     * @param array $attributes
     *
     * @return $this
     */
    public function setAttributes(array $attributes);

    /**
     * Get the attributes.
     *
     * @param null $key
     *
     * @return \Illuminate\Support\Collection|mixed
     */
    public function getAttributes($key = null);

    /**
     * Get whether the attributes are set.
     *
     * @return bool
     */
    public function hasAttributes();

    /**
     * Set the raw data.
     *
     * @param array $data
     *
     * @return $this
     */
    public function setData(array $data);

    /**
     * Get the raw data.
     *
     * @return array
     */
    public function getData();

    /**
     * Get whether the raw data is set.
     *
     * @return bool
     */
    public function hasData();

    /**
     * Process the raw data and return a collection filled with populated models.
     *
     * @return \Illuminate\Support\Collection
     */
    public function process();

    /**
     * Process each data section individually.
     *
     * @param $key      Integer
     * @param $value    \Illuminate\Support\Collection
     *
     * @return mixed
     */
    public function fill($key, $value);
}