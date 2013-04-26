<?php
namespace WebTales\MongoFilters;

class NotInUidFilter extends OperatorToUidFilter
{
    protected $_operator = '$nin';
}