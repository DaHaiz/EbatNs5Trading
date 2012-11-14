<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetCategoryMappingsRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetCategoryMappings
 * 
 * Sample call for GetCategoryMappings
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetCategoryMappings.php,v 1.107 2012-09-10 11:01:20 michaelcoslar Exp $
 * @access public 
 */
class sample_GetCategoryMappings extends EbatNs_Environment
{

   /**
     * sample_GetCategoryMappings::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
	public function dispatchCall ($params)
    {
        $req = new GetCategoryMappingsRequestType();
        
        $res = $this->proxy->GetCategoryMappings($req);
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

$x = new sample_GetCategoryMappings();
$x->dispatchCall(array());

?>