<?php
namespace WebTales\MongoFilters\Composite;

use WebTales\MongoFilters\CompositeFilter;

class OrFilter extends CompositeFilter
{
    /*
     * (non-PHPdoc) @see \WebTales\MongoFilters\AbstractFilter::toArray()
     */
    public function toArray ()
    {
        $buildFiltersArray = array();
        foreach ($this->_filtersArray as $filter) {
            $buildFiltersArray[] = $filter->toArray();
        }
        
        $returnArray = array(
            '$or' => $buildFiltersArray
        );
        return $returnArray;
    }
}

?>