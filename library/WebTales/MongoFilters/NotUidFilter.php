<?php
namespace WebTales\MongoFilters;

class NotUidFilter extends OperatorToUidFilter
{

    protected $operator = '$ne';
}
