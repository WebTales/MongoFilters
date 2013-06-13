<?php
namespace WebTales\MongoFilters;

use WebTales\MongoFilters\AbstractFilter;
use WebTales\MongoFilters\Exception;

class ValueFilter extends AbstractFilter
{

    protected $_name;

    protected $_value;

    public function __construct (array $params = null)
    {
        if (isset($params['name'])) {
            $this->_name = $params['name'];
        }
        if (isset($params['value'])) {
            $this->_value = $params['value'];
        }
        return $this;
    }

    public function toArray ()
    {
        if (! isset($this->_name)) {
            throw new Exception('name is required');
        }
        if (! isset($this->_value)) {
            throw new Exception('value is required');
        }
        return array(
            $this->_name => $this->_value
        );
    }

    public function getName ()
    {
        return $this->_name;
    }

    public function getValue ()
    {
        return $this->_value;
    }

    public function setName ($_name)
    {
        $this->_name = $_name;
        return $this;
    }

    public function setValue ($_value)
    {
        $this->_value = $_value;
        return $this;
    }
}