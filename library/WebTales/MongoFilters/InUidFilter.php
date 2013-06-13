<?php
namespace WebTales\MongoFilters;

class InUidFilter extends OperatorToUidFilter
{

    protected $operator = '$in';
}
