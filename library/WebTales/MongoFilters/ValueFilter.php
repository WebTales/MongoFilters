<?php
namespace WebTales\MongoFilters;

use WebTales\MongoFilters\AbstractFilter;
use WebTales\MongoFilters\Exception;

class ValueFilter extends AbstractFilter
{

    protected $name;

    protected $value;

    public function __construct (array $params = null)
    {
        if (isset($params['name'])) {
            $this->name = $params['name'];
        }
        if (isset($params['value'])) {
            $this->value = $params['value'];
        }
        return $this;
    }

    public function toArray ()
    {
        if (! isset($this->name)) {
            throw new Exception('name is required');
        }
        if (! isset($this->value)) {
            throw new Exception('value is required');
        }
        return array(
            $this->name => $this->value
        );
    }

    public function getName ()
    {
        return $this->name;
    }

    public function getValue ()
    {
        return $this->value;
    }

    public function setName ($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setValue ($value)
    {
        $this->value = $value;
        return $this;
    }
}
