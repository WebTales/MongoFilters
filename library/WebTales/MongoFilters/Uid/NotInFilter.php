<?php
namespace WebTales\MongoFilters\Uid;

class NotInFilter extends OperatorToUidFilter
{
    protected $_operator = '$nin';
}