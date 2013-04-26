<?php
namespace WebTales\MongoFilters\Uid;

class InUidFilter extends OperatorToUidFilter
{
    protected $_operator = '$in';
}