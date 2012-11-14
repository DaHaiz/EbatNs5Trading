<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetMessagePreferencesRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetMessagePreferences
 * 
 * Sample call for GetMessagePreferences
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetMessagePreferences.php,v 1.107 2012-09-10 11:01:20 michaelcoslar Exp $
 * @access public 
 */
class sample_GetMessagePreferences extends EbatNs_Environment
{

   /**
     * sample_GetMessagePreferences::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
	public function dispatchCall ($params)
    {
        $req = new GetMessagePreferencesRequestType();
        $req->setSellerID($params['SellerID']);
        
        $res = $this->proxy->GetMessagePreferences($req);
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

$x = new sample_GetMessagePreferences();
$x->dispatchCall
(
	array
	(
		'SellerID' => 'its-seller-001'
	)
);

?>