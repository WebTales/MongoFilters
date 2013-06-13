<?php
namespace WebTales\MongoFilters;

class NotInUidFilter extends OperatorToUidFilter
{

    protected $operator = '$nin';
}
