<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetCategory2CSRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetCategory2CS
 * 
 * Sample call for GetCategory2CS
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetCategory2CS.php,v 1.107 2012-09-10 11:01:20 michaelcoslar Exp $
 * @access public 
 */
class sample_GetCategory2CS extends EbatNs_Environment
{

   /**
     * sample_GetCategory2CS::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
    public function dispatchCall ($params)
    {
        $req = new GetCategory2CSRequestType();
        $req->setCategoryID($params['CategoryID']);
		$req->setDetailLevel($params['DetailLevel']);
        
        $res = $this->proxy->GetCategory2CS($req);
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

$x = new sample_GetCategory2CS();
$x->dispatchCall
(
	array
	(
		'CategoryID' => '23268',
		'DetailLevel' => 'ReturnAll'
	)
);
?>
