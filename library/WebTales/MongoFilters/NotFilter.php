<?php
namespace WebTales\MongoFilters;

class NotFilter extends OperatorToValueFilter
{
    protected $_operator = '$ne';
}