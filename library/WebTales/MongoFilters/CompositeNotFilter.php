<?php
namespace WebTales\MongoFilters;

use WebTales\MongoFilters\CompositeFilter;

class CompositeNotFilter extends CompositeFilter
{
    /*
     * (non-PHPdoc) @see \WebTales\MongoFilters\AbstractFilter::toArray()
     */
    public function toArray()
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
            $returnArray = array(
                '$not' => $buildFiltersArray
            );
            return $returnArray;
        } else {
            $returnArray = array(
                '$not' => array(
                    '$and' => $buildFiltersArray
                )
            );
            return $returnArray;
        }
    }
}
