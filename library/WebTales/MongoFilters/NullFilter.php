<?php
namespace WebTales\MongoFilters;

use WebTales\MongoFilters\AbstractFilter;
use WebTales\MongoFilters\Exception;

class NullFilter extends ValueFilter
{

    public function __construct(array $params = null)
    {
        if (isset($params['name'])) {
            $this->name = $params['name'];
        }
        return $this;
    }

    public function toArray()
    {
        if (! isset($this->name)) {
            throw new Exception('name is required');
        }
        
        return array(
            $this->name => null
        );
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}
