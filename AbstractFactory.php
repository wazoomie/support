<?php

namespace Wazoomie\Support;

use Illuminate\Support\Collection;

abstract class AbstractFactory implements Contracts\FactoryInterface
{
    /**
     * @var \Illuminate\Support\Collection
     */
    protected $collection;

    /**
     * The bound model.
     */
    protected $model;

    /**
     * The raw data.
     *
     * @var array
     */
    protected $data;

    /**
     * @var array
     */
    protected $attributes;

    /**
     * Set the attributes.
     *
     * @param array $attributes
     *
     * @return $this
     */
    public function setAttributes(array $attributes)
    {
        $this->attributes = collect($attributes);
        return $this;
    }

    /**
     * Get the attributes.
     *
     * @param null $key
     *
     * @return \Illuminate\Support\Collection|mixed
     */
    public function getAttributes($key = null)
    {
        if (!($key)) {
            return $this->attributes;
        }

        return $this->attributes->get($key);
    }

    /**
     * Get whether the attributes are set.
     *
     * @return bool
     */
    public function hasAttributes()
    {
        return (bool) $this->attributes;
    }

    /**
     * Set the raw data.
     *
     * @param array $data
     *
     * @return $this
     */
    public function setData(array $data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * Get the raw data.
     *
     * @return array
     */
    public function getData()
    {
        return (array) $this->data;
    }

    /**
     * Get whether the raw data is set.
     *
     * @return bool
     */
    public function hasData()
    {
        return (bool) $this->data && count($this->data);
    }

    /**
     * Process the raw data and return a collection filled with populated models.
     *
     * @return \Illuminate\Support\Collection
     */
    public function process()
    {
        $this->data = array_values($this->data);

        if (isset($this->data[0])) {
            $data = $this->data;
        } else {
            $data = [$this->data];
        }

        foreach ($data as $key => $value) {
            $model = $this->fill($key, collect($value));
            $this->collection->push($model);
        }

        return $this->collection;
    }

    /**
     * Process each data section individually.
     *
     * @param $key      Integer
     * @param $value    \Illuminate\Support\Collection
     *
     * @return mixed
     */
    abstract public function fill($key, $value);
}