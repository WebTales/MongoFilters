<?php
namespace WebTales\MongoFilters\Uid;

class NotInFilter extends OperatorToValueFilter
{
    protected $_operator = '$nin';
}