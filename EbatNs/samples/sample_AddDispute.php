<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'AddDisputeRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_AddDispute
 * 
 * Sample call for AddDispute
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_AddDispute.php,v 1.107 2012-09-10 11:01:19 michaelcoslar Exp $
 * @access public 
 */

class sample_AddDispute extends EbatNs_Environment
{

    /**
     * sample_AddDispute::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
    public function dispatchCall ($params)
    {
        $req = new AddDisputeRequestType();
        $req->setDisputeExplanation($params['DisputeExplanation']);
		$req->setDisputeReason($params['DisputeReason']);
		$req->setItemID($params['ItemID']);
		$req->setTransactionID($params['TransactionID']);
        
        $res = $this->proxy->AddDispute($req);
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

$x = new sample_AddDispute();
$x->dispatchCall
(
	array
	(
		'DisputeExplanation' => 'BuyerNoLongerRegistered',
		'DisputeReason' => 'BuyerHasNotPaid',
		'ItemID' => 'dummy',
		'TransactionID' => 'dummy'
	)
);
?>