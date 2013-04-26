MongoFilters
============

Filter Layer for MongoDB queries

Exemple of use :

	Use WebTales\MongoFilters\Filter;
	(...)

	//generic Filter => global "And"
    $filters = Filter::Factory(); 
    
    //Simpler filter : name => value
    $filter = Filter::Factory('Value',array(
        'name' => 'param',
        'value' => 'value'
    ));
    $filters->addFilter($filter);
    
    //In Filter : name => '$in' => array
    $filter = Filter::Factory('In') 
                //fluid definition of values
                ->setName('param2') 
                ->setValue(array(
                    'value1',
                    'value2'
                    ));
    $filters->addFilter($filter);
    
    //Or Filter, can be nested and so on...
    $filter = Filter::Factory('Or'); 
    
    //Simple Not
    $subfilter = Filter::Factory('Not',array('name'=>'param3','value'=>'value3')); 
    $filter->addFilter($subfilter);
    
    //Uid Filter : accept MongoId object or strings. Automagic handling of string to MongoId when building array
    $subfilter = Filter::Factory('InUid',array('value'=>array('5178f41a2a804fdc5c000088','5178f41a2a804fdc5c000089')));
    $filter->addFilter($subfilter);
    
    $filters->addFilter($filter);
    
    //converter filter to Array and do request. (also see toJson if you want to see the query in mongoDB way
	$cursor = $aMongoCollectionObject->find($filters->toArray());
	(...)


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
