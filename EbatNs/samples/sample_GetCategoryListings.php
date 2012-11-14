<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetCategoryListingsRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetCategoryListings
 * 
 * Sample call for GetCategoryListings
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetCategoryListings.php,v 1.107 2012-09-10 11:01:20 michaelcoslar Exp $
 * @access public 
 */
class sample_GetCategoryListings extends EbatNs_Environment
{

   /**
     * sample_GetCategoryListings::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
	public function dispatchCall ($params)
    {
        $req = new GetCategoryListingsRequestType();
        $req->setCategoryID($params['CategoryID']);
        
        $res = $this->proxy->GetCategoryListings($req);
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

$x = new sample_GetCategoryListings();
$x->dispatchCall
(
	array
	(
		'CategoryID' => '8267'
	)
);

?>