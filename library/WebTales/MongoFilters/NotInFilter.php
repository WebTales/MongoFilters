<?php
namespace WebTales\MongoFilters;

class NotInFilter extends OperatorToValueFilter
{

    protected $operator = '$nin';
}
