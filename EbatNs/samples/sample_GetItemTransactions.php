<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetItemTransactionsRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetItemTransactions
 * 
 * Sample call for GetItemTransactions
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetItemTransactions.php,v 1.107 2012-09-10 11:01:20 michaelcoslar Exp $
 * @access public 
 */
class sample_GetItemTransactions extends EbatNs_Environment
{

   /**
     * sample_GetItemTransactions::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
    public function dispatchCall ($params)
    {
        $req = new GetItemTransactionsRequestType();
		$req->setItemID($params['ItemID']);
        
        $res = $this->proxy->GetItemTransactions($req);
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

$x = new sample_GetItemTransactions();
$x->dispatchCall
(
	array
	(
		'ItemID' => '110031606665'
	)
);
?>
