<?php
namespace WebTales\MongoFilters\Uid;

class NotInUidFilter extends OperatorToUidFilter
{
    protected $_operator = '$nin';
}