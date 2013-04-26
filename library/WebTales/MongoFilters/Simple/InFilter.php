<?php
namespace WebTales\MongoFilters\Simple;

class InFilter extends OperatorToValueFilter
{
    protected $_operator = '$in';
}