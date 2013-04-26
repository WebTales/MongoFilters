<?php
namespace WebTales\MongoFilters;

abstract class AbstractFilter implements IFilter
{

    public function __construct (array $params=null)
    {}

    public function toArray ()
    {}
}