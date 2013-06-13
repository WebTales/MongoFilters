<?php
namespace WebTales\MongoFilters;

abstract class CompositeFilter extends AbstractFilter implements ICompositeFilter
{

    protected $filtersArray = array();

    public function addFilter (IFilter $filter)
    {
        $this->filtersArray[] = $filter;
        return $this;
    }

    public function clearFilters ()
    {
        $this->filtersArray = array();
        return $this;
    }

    public function setFilters (array $filters)
    {
        $this->filtersArray = array();
        
        foreach ($filters as $filter) {
            if (! $filter instanceof IFilter) {
                throw new Exception(__METHOD__ . ' only accepts IFilter instance');
            }
            $this->addFilter($filter);
        }
        
        return $this;
    }

    /**
     *
     * @return array $filtersArray
     */
    public function getFilters ()
    {
        return $this->filtersArray;
    }
}
