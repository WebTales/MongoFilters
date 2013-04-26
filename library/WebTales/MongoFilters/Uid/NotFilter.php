<?php
namespace WebTales\MongoFilters\Uid;

class NotFilter extends OperatorToUidFilter
{
    protected $_operator = '$ne';
}