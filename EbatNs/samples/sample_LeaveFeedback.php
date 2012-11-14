<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'LeaveFeedbackRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_LeaveFeedback
 * 
 * Sample call for LeaveFeedback
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_LeaveFeedback.php,v 1.107 2012-09-10 11:01:22 michaelcoslar Exp $
 * @access public
 */
class sample_LeaveFeedback extends EbatNs_Environment
{

   /**
     * sample_LeaveFeedback::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
    public function dispatchCall ($params)
    {
        $req = new LeaveFeedbackRequestType();
        $req->setItemID($params['ItemID']);
        $req->setTargetUser($params['TargetUser']);
        $req->setCommentText($params['CommentText']);
        $req->setCommentType($params['CommentType']);
		
        $res = $this->proxy->LeaveFeedback($req);
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

$x = new sample_LeaveFeedback();
$x->dispatchCall
(
	array
	(
		'ItemID' => '110031667533',
		'TargetUser' => 'its-seller-001',
		'CommentText' => 'Good article',
		'CommentType' => 'Positive'
	)
);
?>
