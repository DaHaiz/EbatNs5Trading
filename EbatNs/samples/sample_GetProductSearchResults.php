<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetProductSearchResultsRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetProductSearchResults
 * 
 * Sample call for GetProductSearchResults
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetProductSearchResults.php,v 1.107 2012-09-10 11:01:21 michaelcoslar Exp $
 * @access public 
 */
class sample_GetProductSearchResults extends EbatNs_Environment
{

   /**
     * sample_GetProductSearchResults::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
	public function dispatchCall ($params)
    {
        $req = new GetProductSearchResultsRequestType();
        
        $ProductSearch = new ProductSearchType();
        $SearchAttributes = new SearchAttributesType();
        $SearchAttributes->setAttributeID($params['AttributeID']);
        $ProductSearch->setSearchAttributes($SearchAttributes);
        $req->setProductSearch($ProductSearch);
        
        $res = $this->proxy->GetProductSearchResults($req);
        if ($this->testValid($res))
        {
            $this->dumpObject($res);
            return (true);
        }
        else 
        {
            return (false);
        }
    }
}

$x = new sample_GetProductSearchResults();
$x->dispatchCall
(
	array
	(
		'AttributeID' => '10425'
	)
);

?>