<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'AddDisputeResponseRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_AddDisputeResponse
 *
 * Sample call for AddDisputeResponse
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann
 * @copyright Copyright (c) 2008
 * @version $Id: sample_AddDisputeResponse.php,v 1.107 2012-09-10 11:01:19 michaelcoslar Exp $
 * @access puplic
 */
class sample_AddDisputeResponse extends EbatNs_Environment
{

    /**
     * sample_AddDisputeResponse::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
    public function dispatchCall ($params)
    {
        $req = new AddDisputeResponseRequestType();
        $req->setDisputeActivity($params['DisputeActivity']);
        $req->setDisputeID($params['DisputeID']);
        $req->setMessageText($params['MessageText']);
		
        $res = $this->proxy->AddDisputeResponse($req);
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

$x = new sample_AddDisputeResponse();
$x->dispatchCall
(
	array
	(
		'DisputeActivity' => 'SellerComment',
		'DisputeID' => 'dummy',
		'MessageText' => 'Dispute Text'
	)
);
?>