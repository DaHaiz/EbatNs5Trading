<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetDescriptionTemplatesRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetDescriptionTemplates
 * 
 * Sample call for GetDescriptionTemplates
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetDescriptionTemplates.php,v 1.107 2012-09-10 11:01:20 michaelcoslar Exp $
 * @access public 
 */
class sample_GetDescriptionTemplates extends EbatNs_Environment
{

   /**
     * sample_GetDescriptionTemplates::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
    public function dispatchCall ($params)
    {
        $req = new GetDescriptionTemplatesRequestType();
		
        $res = $this->proxy->GetDescriptionTemplates($req);
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

$x = new sample_GetDescriptionTemplates();
$x->dispatchCall(array());
?>
