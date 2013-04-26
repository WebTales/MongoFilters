<?php
namespace WebTales\MongoFilters;

abstract class AbstractFilter implements IFilter
{

    public function __construct (array $params=null)
    {
        return $this;
    }
    
    public function toJson(){
        $resultArray = $this->toArray();
        if(defined('JSON_PRETTY_PRINT')){
            $resultJson = json_encode($resultArray,JSON_PRETTY_PRINT);
        }else{
            $resultJson = json_encode($resultArray);
        }
        return $resultJson;
    }
}