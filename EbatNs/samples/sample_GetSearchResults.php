<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetSearchResultsRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetSearchResults
 * 
 * Sample call for GetSearchResults
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetSearchResults.php,v 1.107 2012-09-10 11:01:21 michaelcoslar Exp $
 * @access public
 */
class sample_GetSearchResults extends EbatNs_Environment
{

   /**
     * sample_GetSearchResults::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
    public function dispatchCall ($params)
    {
        $req = new GetSearchResultsRequestType();
        //$req->setCategoryID('8267');
        $req->setQuery($params['QueryKeywords']);
        //$req->setEndTimeFrom("2008-05-25 15:00:00");
        //$req->setEndTimeTo("2008-05-27 15:00:00");
        
        //$locFilter = new SearchLocationFilterType();
        //$locFilter->setCountryCode('DE');
        //$req->setSearchLocationFilter($locFilter);
        
        $req->setDetailLevel($params['DetailLevel']);
        
        //$req->setQuantity(7);
        //$req->setQuantityOperator($Facet_QuantityOperatorCodeType->GreaterThanOrEqual);
        
        //$br = new BidRangeType();
        //$br->setMinimumBidCount(3);
        //$req->setBidRange($br);
        
        //$pagination = new PaginationType();
        //$pagination->setEntriesPerPage(100);
        //$pagination->setPageNumber(1);
        //$req->setPagination($pagination);
		
        $res = $this->proxy->GetSearchResults($req);
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

$x = new sample_GetSearchResults();
$x->dispatchCall
(
	array
	(
		'QueryKeywords' => 'test',
		'DetailLevel' => 'ReturnAll'
	)
);
?>