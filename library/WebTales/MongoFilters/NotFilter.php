<?php
namespace WebTales\MongoFilters;

class NotFilter extends OperatorToValueFilter
{

    protected $operator = '$ne';
}
