<?php
namespace WebTales\MongoFilters;

interface IFilter
{
    public function __construct(array $params);
    
    public function toArray();
}