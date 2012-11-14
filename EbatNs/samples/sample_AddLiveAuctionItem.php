<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'AddLiveAuctionItemRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_AddLiveAuctionItem
 * 
 * Sample call for AddLiveAuctionItem
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_AddLiveAuctionItem.php,v 1.107 2012-09-10 11:01:19 michaelcoslar Exp $
 * @access public 
 */
class sample_AddLiveAuctionItem extends EbatNs_Environment
{

       /**
     * sample_AddLiveAuctionItem::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
    public function dispatchCall ($params)
    {
        $req = new AddLiveAuctionItemRequestType();
        
        $item = new ItemType();
        $item->setStartPrice($params['StartPrice']);
        
        
        $la = new LiveAuctionDetailsType();
        $la->setLotNumber($params['LotNumber']);
        $item->setLiveAuctionDetails($la);
		$req->setItem($item);

        $res = $this->proxy->AddLiveAuctionItem($req);
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

$x = new sample_AddLiveAuctionItem();
$x->dispatchCall
(
	array
	(
		'StartPrice' => '15.00',
		'LotNumber' => '3'
	)
);
?>
