<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetLiveAuctionBiddersRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetLiveAuctionBidders
 * 
 * Sample call for GetLiveAuctionBidders
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetLiveAuctionBidders.php,v 1.107 2012-09-10 11:01:20 michaelcoslar Exp $
 * @access public 
 */
class sample_GetLiveAuctionBidders extends EbatNs_Environment
{

   /**
     * sample_GetLiveAuctionBidders::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
    public function dispatchCall ($params)
    {
        $req = new GetLiveAuctionBiddersRequestType();
        $req->setUserCatalogID($params['UserCatalogID']);
		
        $res = $this->proxy->GetLiveAuctionBidders($req);
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

$x = new sample_GetLiveAuctionBidders();
$x->dispatchCall
(
	array
	(
		'UserCatalogID' => 'dummy'
	)
);
?>