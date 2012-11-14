<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetBestOffersRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetBestOffers
 * 
 * Sample call for GetBestOffers
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetBestOffers.php,v 1.107 2012-09-10 11:01:20 michaelcoslar Exp $
 * @access public 
 */
class sample_GetBestOffers extends EbatNs_Environment
{

   /**
     * sample_GetBestOffers::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
    public function dispatchCall ($params)
    {
        $req = new GetBestOffersRequestType();
		$req->setItemID($params['ItemID']);
        
        $res = $this->proxy->GetBestOffers($req);
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

$x = new sample_GetBestOffers();
$x->dispatchCall
(
	array
	(
		'ItemID' => '110031854626'
	)
);
?>