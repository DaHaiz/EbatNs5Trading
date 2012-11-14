<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetApiAccessRulesRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetApiAccessRules
 * 
 * Sample call for GetApiAccessRules
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetApiAccessRules.php,v 1.107 2012-09-10 11:01:20 michaelcoslar Exp $
 * @access public 
 */
class sample_GetApiAccessRules extends EbatNs_Environment
{

   /**
     * sample_GetApiAccessRules::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
    public function dispatchCall ($params)
    {
        $req = new GetApiAccessRulesRequestType();
		
        $res = $this->proxy->GetApiAccessRules($req);
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

$x = new sample_GetApiAccessRules();
$x->dispatchCall(array());
?>