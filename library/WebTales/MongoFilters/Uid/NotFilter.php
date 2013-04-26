<?php
namespace WebTales\MongoFilters\Uid;

class NotFilter extends OperatorToValueFilter
{
    protected $_operator = '$ne';
}