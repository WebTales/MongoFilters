<?php
namespace WebTales\MongoFilters;

class InUidFilter extends OperatorToUidFilter
{
    protected $_operator = '$in';
}