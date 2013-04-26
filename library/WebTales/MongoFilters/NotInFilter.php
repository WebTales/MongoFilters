<?php
namespace WebTales\MongoFilters;

class NotInFilter extends OperatorToValueFilter
{
    protected $_operator = '$nin';
}