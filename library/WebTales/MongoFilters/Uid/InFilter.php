<?php
namespace WebTales\MongoFilters\Uid;

class InFilter extends OperatorToValueFilter
{
    protected $_operator = '$in';
}