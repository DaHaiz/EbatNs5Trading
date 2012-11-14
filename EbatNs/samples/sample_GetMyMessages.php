<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetMyMessagesRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetMyMessages
 * 
 * Sample call for GetMyMessages
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetMyMessages.php,v 1.107 2012-09-10 11:01:20 michaelcoslar Exp $
 * @access public 
 */
class sample_GetMyMessages extends EbatNs_Environment
{

   /**
     * sample_GetMyMessages::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
    public function dispatchCall ($params)
    {
        $req = new GetMyMessagesRequestType();
        $req->setDetailLevel($params['DetailLevel']);

        $messageIDs = new MyMessagesMessageIDArrayType();
        $messageIDs->setMessageID($params['MessageID']);
        $req->setMessageIDs($messageIDs);
        
        $res = $this->proxy->GetMyMessages($req);
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

$x = new sample_GetMyMessages();
$x->dispatchCall
(
	array
	(
		'DetailLevel' => 'ReturnMessages',
		'MessageID' => '7'
	)
);
?>
