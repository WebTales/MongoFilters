<?php
namespace WebTales\MongoFilters;

class InFilter extends OperatorToValueFilter
{

    protected $_operator = '$in';
}