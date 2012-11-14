<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'ReviseItemRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_ReviseItem
 * 
 * Sample call for ReviseItem
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_ReviseItem.php,v 1.107 2012-09-10 11:01:22 michaelcoslar Exp $
 * @access public
 */
class sample_ReviseItem extends EbatNs_Environment
{

   /**
     * sample_ReviseItem::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
    public function dispatchCall ($params)
    {
        $req = new ReviseItemRequestType();
        
        $item = new ItemType();
        $item->setItemID($params['ItemID']);
        $item->setDescription($params['Description']);
        $req->setItem($item);
		
        $res = $this->proxy->ReviseItem($req);
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

$x = new sample_ReviseItem();
$x->dispatchCall
(
	array
	(
		'ItemID' => '110031606665',
		'Description' => 'Test-iPod'
	)
);
?>