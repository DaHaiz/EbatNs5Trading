<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetUserContactDetailsRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetUserContactDetails
 * 
 * Sample call for GetUserContactDetails
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetUserContactDetails.php,v 1.107 2012-09-10 11:01:21 michaelcoslar Exp $
 * @access public
 */
class sample_GetUserContactDetails extends EbatNs_Environment
{

   /**
     * sample_GetUserContactDetails::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
	public function dispatchCall ($params)
    {
        $req = new GetUserContactDetailsRequestType();
        $req->setContactID($params['ContactID']);
        $req->setItemID($params['ItemID']);
        $req->setRequesterID($params['RequesterID']);
        
        $res = $this->proxy->GetUserContactDetails($req);
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

$x = new sample_GetUserContactDetails();
$x->dispatchCall
(
	array
	(
		'ContactID' => 'testuser_4s2',
		'ItemID' => '110032352144',
		'RequesterID' => 'its-seller-001'
	)
);

?>