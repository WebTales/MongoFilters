<?php
namespace WebTales\MongoFilters;

use WebTales\MongoFilters\AbstractFilter;
use WebTales\MongoFilters\Exception;

class UidFilter extends AbstractFilter
{

    protected $value;

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        if (! is_string($value) && ! $value instanceof \MongoId) {
            throw new Exception('Only Accepts string or MongoId');
        }
        $this->value = $value;
        
        return $this;
    }

    public function __construct(array $params = null)
    {
        if (isset($params['value'])) {
            $this->setValue($params['value']);
        }
        
        return $this;
    }

    public function toArray()
    {
        $id = $this->value;

        try {
            $id = new \MongoId($id);
        } catch(\Exception $e) {
            if(!is_string($id)) {
                throw new Exception('Invalid MongoId :' . $id);
            }
        }

        return array(
            '_id' => $id
        );
    }
}
