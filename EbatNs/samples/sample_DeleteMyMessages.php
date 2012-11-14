<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'DeleteMyMessagesRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_DeleteMyMessages
 * 
 * Sample call for DeleteMyMessages
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_DeleteMyMessages.php,v 1.107 2012-09-10 11:01:20 michaelcoslar Exp $
 * @access public 
 */
class sample_DeleteMyMessages extends EbatNs_Environment
{

   /**
     * sample_DeleteMyMessages::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
	public function dispatchCall ($params)
    {
        $req = new DeleteMyMessagesRequestType();
        
        $MessageIDs = new MyMessagesMessageIDArrayType();
        $MessageIDs->setMessageID($params['MessageID']);
        $req->setMessageIDs($MessageIDs);
		
        $res = $this->proxy->DeleteMyMessages($req);
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

$x = new sample_DeleteMyMessages();
$x->dispatchCall
(
	array
	(
		'MessageID' => '5'
	)
);

?>