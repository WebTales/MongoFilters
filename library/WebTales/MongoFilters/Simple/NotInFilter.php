<?php
namespace WebTales\MongoFilters\Simple;

class NotInFilter extends OperatorToValueFilter
{
    protected $_operator = '$nin';
}

?>