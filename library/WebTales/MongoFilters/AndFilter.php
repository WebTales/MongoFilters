<?php
namespace WebTales\MongoFilters;

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
            $filterArray = $filter->toArray();
            if (! empty($filterArray)) {
                $buildFiltersArray[] = $filterArray;
            }
        }
        if (empty($buildFiltersArray)) {
            return array();
        } elseif (count($buildFiltersArray) == 1) {
            return array_pop($buildFiltersArray);
        } else {
            $returnArray = array(
                '$and' => $buildFiltersArray
            );
            return $returnArray;
        }
    }
}

?>