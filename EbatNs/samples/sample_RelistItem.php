<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'RelistItemRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_RelistItem
 * 
 * Sample call for RelistItem
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_RelistItem.php,v 1.107 2012-09-10 11:01:22 michaelcoslar Exp $
 * @access public
 */
class sample_RelistItem extends EbatNs_Environment
{

   /**
     * sample_RelistItem::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
    public function dispatchCall ($params)
    {
        $req = new RelistItemRequestType();
		
        $item = new ItemType();
        $item->setItemID($params['ItemID']);
        $req->setItem($item);
        
        $res = $this->proxy->RelistItem($req);
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

$x = new sample_RelistItem();
$x->dispatchCall
(
	array
	(
		'ItemID' => '110031510912'
	)
);
?>