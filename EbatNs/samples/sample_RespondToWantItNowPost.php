<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'RespondToWantItNowPostRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_RespondToWantItNowPost
 * 
 * Sample call for RespondToWantItNowPost
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_RespondToWantItNowPost.php,v 1.107 2012-09-10 11:01:22 michaelcoslar Exp $
 * @access public
 */
class sample_RespondToWantItNowPost extends EbatNs_Environment
{

   /**
     * sample_RespondToWantItNowPost::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
	public function dispatchCall ($params)
    {
        $req = new RespondToWantItNowPostRequestType();
        $req->setItemID($params['ItemID']);
        $req->setPostID($params['PostID']);
        
        $res = $this->proxy->RespondToWantItNowPost($req);
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

$x = new sample_RespondToWantItNowPost();
$x->dispatchCall
(
	array
	(
		'ItemID' => '110032247247',
		'PostID' => '110032358304'
	)
);

?>