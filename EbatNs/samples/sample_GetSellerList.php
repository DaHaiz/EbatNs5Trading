<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetSellerListRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetSellerList
 * 
 * Sample call for GetSellerList
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetSellerList.php,v 1.107 2012-09-10 11:01:21 michaelcoslar Exp $
 * @access public
 */
class sample_GetSellerList extends EbatNs_Environment
{

   /**
     * sample_GetSellerList::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
    public function dispatchCall ($params)
    {
        $req = new GetSellerListRequestType();
		
        $res = $this->proxy->GetSellerList($req);
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

$x = new sample_GetSellerList();
$x->dispatchCall(array());
?>