<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetStorePreferencesRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetStorePreferences
 * 
 * Sample call for GetStorePreferences
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetStorePreferences.php,v 1.107 2012-09-10 11:01:21 michaelcoslar Exp $
 * @access public
 */
class sample_GetStorePreferences extends EbatNs_Environment
{

   /**
     * sample_GetStorePreferences::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
    public function dispatchCall ($params)
    {
        $req = new GetStorePreferencesRequestType();
		
        $res = $this->proxy->GetStorePreferences($req);
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

$x = new sample_GetStorePreferences();
$x->dispatchCall(array());
?>