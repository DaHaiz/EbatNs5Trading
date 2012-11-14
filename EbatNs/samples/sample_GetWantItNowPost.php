<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetWantItNowPostRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetWantItNowPost
 * 
 * Sample call for GetWantItNowPost
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetWantItNowPost.php,v 1.107 2012-09-10 11:01:21 michaelcoslar Exp $
 * @access public
 */
class sample_GetWantItNowPost extends EbatNs_Environment
{

   /**
     * sample_GetWantItNowPost::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
	public function dispatchCall ($params)
    {
        $req = new GetWantItNowPostRequestType();
        $req->setPostID($params['PostID']);
        
        $res = $this->proxy->GetWantItNowPost($req);
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

$x = new sample_GetWantItNowPost();
$x->dispatchCall
(
	array
	(
		'PostID' => '110032358304'
	)
);

?>