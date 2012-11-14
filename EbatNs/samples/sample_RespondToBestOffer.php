<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'RespondToBestOfferRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_RespondToBestOffer
 * 
 * Sample call for RespondToBestOffer
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_RespondToBestOffer.php,v 1.107 2012-09-10 11:01:22 michaelcoslar Exp $
 * @access public
 */
class sample_RespondToBestOffer extends EbatNs_Environment
{

   /**
     * sample_RespondToBestOffer::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
	public function dispatchCall ($params)
    {
        $req = new RespondToBestOfferRequestType();
        $req->setAction($params['Action']);
        $req->setBestOfferID($params['BestOfferID']);
        $req->setItemID($params['ItemID']);
        
        $res = $this->proxy->RespondToBestOffer($req);
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

$x = new sample_RespondToBestOffer();
$x->dispatchCall
(
	array
	(
		'Action' => 'Accept',
		'BestOfferID' => 'its-buyer-001',
		'ItemID' => '110032195203'
	)
);

?>