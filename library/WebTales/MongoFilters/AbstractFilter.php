<?php
namespace WebTales\MongoFilters;

abstract class AbstractFilter implements IFilter
{

    public function __construct (array $params)
    {}

    public function toArray ()
    {}
}