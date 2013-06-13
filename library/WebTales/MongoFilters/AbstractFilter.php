<?php
namespace WebTales\MongoFilters;

abstract class AbstractFilter implements IFilter
{

    public static function Factory ($name = null, $params = null)
    {
        if (is_null($name)) {
            return new Filter($params);
        }
        switch ($name) {
            default:
                $className = __NAMESPACE__ . '\\' . $name . 'Filter';
                return new $className($params);
        }
    }

    public function __construct (array $params = null)
    {
        return $this;
    }

    public function toJson ()
    {
        $resultArray = $this->toArray();
        if (defined('JSON_PRETTY_PRINT')) {
            $resultJson = json_encode($resultArray, JSON_PRETTY_PRINT);
        } else {
            $resultJson = json_encode($resultArray);
        }
        return $resultJson;
    }
}