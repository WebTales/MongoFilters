<?php
namespace WebTales\MongoFilters;

use WebTales\MongoFilters\Exception;

class OperatorToUidFilter extends UidFilter
{

    protected $operator = null;

    public function setValue($value)
    {
        if (is_array($value)) {
            foreach ($value as $key => $id) {
                if ($id === null) {
                    unset($value[$key]);
                } elseif (! is_string($id) && ! $id instanceof \MongoId) {
                    throw new Exception('Only Accepts string or MongoId');
                }
            }
        } elseif (! is_string($value) && ! $value instanceof \MongoId) {
            throw new Exception('Only Accepts string or MongoId');
        }
        
        $this->value = $value;
        
        return $this;
    }

    public function __construct(array $params = null)
    {
        if (isset($params['operator'])) {
            $this->operator = $params['operator'];
        }
        
        return parent::__construct($params);
    }
    
    /*
     * (non-PHPdoc) @see \WebTales\MongoFilters\AbstractFilter::toArray()
     */
    public function toArray()
    {
        if (! isset($this->value)) {
            throw new Exception('value is required');
        }
        if (! isset($this->operator)) {
            throw new Exception('operator is required');
        }
        
        if (is_array($this->value)) {
            $value = array();
            foreach ($this->value as $id) {
                if (! $id instanceof \MongoId) {
                    $id = new \MongoId($id);
                }
                $value[] = $id;
            }
        } else {
            $value = $this->value;
            if (! $value instanceof \MongoId) {
                $value = new \MongoId($value);
            }
        }
        
        return array(
            '_id' => array(
                $this->operator => $value
            )
        );
    }
}
