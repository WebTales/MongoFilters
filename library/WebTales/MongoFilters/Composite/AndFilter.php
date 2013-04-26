<?php
namespace WebTales\MongoFilters\Composite;

use WebTales\MongoFilters\CompositeFilter;

class AndFilter extends CompositeFilter
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
            '$and' => $buildFiltersArray
        );
        return $returnArray;
    }
}

?>