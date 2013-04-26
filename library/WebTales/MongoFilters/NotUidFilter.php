<?php
namespace WebTales\MongoFilters;

class NotUidFilter extends OperatorToUidFilter
{
    protected $_operator = '$ne';
}