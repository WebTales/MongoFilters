MongoFilters
============

Filter Layer for MongoDB queries

Exemple of use :

	$filters = new \WebTales\MongoFilters\Filter();
	
	$filter = new \WebTales\MongoFilters\Simple\ValueFilter(array('name'=>'param1','value'=>'value1'));
	$filters->addFilter($filter);
	
	$filter = new \WebTales\MongoFilters\Simple\InFilter(array('name'=>'param1','value'=>array('value1','value2','value3')));
	$filters->addFilter($filter);
	
	$filter = new \WebTales\MongoFilters\Simple\NotFilter(array('name'=>'param1','value'=>'value1'));
	$filters->addFilter($filter);
	
	$filter = new \WebTales\MongoFilters\Uid\UidFilter(array('value'=>'5178f41a2a804fdc5c000087'));
	$filters->addFilter($filter);
	
	$filter = new \WebTales\MongoFilters\Uid\NotInFilter(array('value'=>array('5178f41a2a804fdc5c000087','5178f41a2a804fdc5c000087')));
	$filters->addFilter($filter);
	
	$cursor = $aMongoCollectionObject->find($filters->toArray());


Copyright (c) 2013-2013 Julien Bourdin

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is furnished
to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
