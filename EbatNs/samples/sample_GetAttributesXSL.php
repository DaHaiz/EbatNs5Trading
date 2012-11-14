<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetAttributesXSLRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetAttributesXSL
 * 
 * Sample call GetAttributesXSL
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetAttributesXSL.php,v 1.107 2012-09-10 11:01:20 michaelcoslar Exp $
 * @access public 
 */
class sample_GetAttributesXSL extends EbatNs_Environment
{

   /**
     * sample_GetAttributesXSL::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
    public function dispatchCall ($params)
    {
        $req = new GetAttributesXSLRequestType();
		
        $res = $this->proxy->GetAttributesXSL($req);
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

$x = new sample_GetAttributesXSL();
$x->dispatchCall(array());
?>