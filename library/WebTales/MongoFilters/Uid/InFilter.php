<?php
namespace WebTales\MongoFilters\Uid;

class InFilter extends OperatorToUidFilter
{
    protected $_operator = '$in';
}