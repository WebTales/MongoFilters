<?php
namespace WebTales\MongoFilters\Uid;

class NotUidFilter extends OperatorToUidFilter
{
    protected $_operator = '$ne';
}