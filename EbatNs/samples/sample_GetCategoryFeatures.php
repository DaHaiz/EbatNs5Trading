<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetCategoryFeaturesRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetCategoryFeatures
 * 
 * Sample call for GetCategoryFeatures
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetCategoryFeatures.php,v 1.107 2012-09-10 11:01:20 michaelcoslar Exp $
 * @access public 
 */
class sample_GetCategoryFeatures extends EbatNs_Environment
{

   /**
     * sample_GetCategoryFeatures::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
	public function dispatchCall ($params)
    {
        $req = new GetCategoryFeaturesRequestType();
        
        $res = $this->proxy->GetCategoryFeatures($req);
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

$x = new sample_GetCategoryFeatures();
$x->dispatchCall(array());

?>