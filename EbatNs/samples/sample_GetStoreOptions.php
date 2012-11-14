<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetStoreOptionsRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetStoreOptions
 * 
 * Sample call for GetStoreOptions
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetStoreOptions.php,v 1.107 2012-09-10 11:01:21 michaelcoslar Exp $
 * @access public
 */
class sample_GetStoreOptions extends EbatNs_Environment
{

   /**
     * sample_GetStoreOptions::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
    public function dispatchCall ($params)
    {
        $req = new GetStoreOptionsRequestType();
		
        $res = $this->proxy->GetStoreOptions($req);
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

$x = new sample_GetStoreOptions();
$x->dispatchCall(array());
?>