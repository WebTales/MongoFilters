<?php
namespace WebTales\MongoFilters;

interface IFilter
{
    public function construct($params);
    
    public function toArray();
}

?>