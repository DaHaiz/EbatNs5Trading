<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'AddSecondChanceItemRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_AddSecondChanceItem
 * 
 * Sample call for AddSecondChanceItem
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_AddSecondChanceItem.php,v 1.107 2012-09-10 11:01:19 michaelcoslar Exp $
 * @access public 
 */
class sample_AddSecondChanceItem extends EbatNs_Environment
{

   /**
     * sample_AddSecondChanceItem::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
	public function dispatchCall ($params)
    {
        $req = new AddSecondChanceItemRequestType();
        $req->setDuration($params['Duration']);
        $req->setItemID($params['ItemID']);
        $req->setRecipientBidderUserID($params['RecipientBidderUserID']);
        
		
        $res = $this->proxy->AddSecondChanceItem($req);
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

$x = new sample_AddSecondChanceItem();
$x->dispatchCall
(
	array
	(
		'Duration' => 'Days_7', 
		'ItemID' => 'ItemIdDummy', 
		'RecipientBidderUserID' => 'UserIdDummy'
	)
);

?>