<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetAttributesCSRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetAttributesCS
 * 
 * Sample call for GetAttributesCS
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetAttributesCS.php,v 1.107 2012-09-10 11:01:20 michaelcoslar Exp $
 * @access public 
 */
class sample_GetAttributesCS extends EbatNs_Environment
{

   /**
     * sample_GetAttributesCS::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
    public function dispatchCall ($params)
    {
        $req = new GetAttributesCSRequestType();
        $req->setDetailLevel($params['DetailLevel']);
        $req->setAttributeSetID($params['AttributeSetID']);
		
        $res = $this->proxy->GetAttributesCS($req);
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

$x = new sample_GetAttributesCS();
$x->dispatchCall
(
	array
	(
		'DetailLevel' => 'ReturnAll',
		'AttributeSetID' => '1950'
	)
);
?>
