<?php
namespace WebTales\MongoFilters;

interface ICompositeFilter extends IFilter
{

    public function addFilter(IFilter $filter);

    public function setFilters(array $filters);

    public function clearFilters();

    public function getFilters();
}
