<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'RespondToFeedbackRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_RespondToFeedback
 * 
 * Sample call for RespondToFeedback
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_RespondToFeedback.php,v 1.107 2012-09-10 11:01:22 michaelcoslar Exp $
 * @access public
 */
class sample_RespondToFeedback extends EbatNs_Environment
{

   /**
     * sample_RespondToFeedback::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
	public function dispatchCall ($params)
    {
        $req = new RespondToFeedbackRequestType();
        $req->setResponseText($params['ResponseText']);
        $req->setResponseType($params['ResponseType']);
        $req->setTargetUserID($params['TargetUserID']);
        
        $res = $this->proxy->RespondToFeedback($req);
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

$x = new sample_RespondToFeedback();
$x->dispatchCall
(
	array
	(
		'ResponseText' => 'dummyResponseText', 
		'ResponseType' => 'FollowUp', 
		'TargetUserID' => 'its-buyer-001'
	)
);

?>