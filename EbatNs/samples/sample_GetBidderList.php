<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetBidderListRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetBidderList
 * 
 * Sample call for GetBidderList
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetBidderList.php,v 1.107 2012-09-10 11:01:20 michaelcoslar Exp $
 * @access public 
 */
class sample_GetBidderList extends EbatNs_Environment
{

   /**
     * sample_GetBidderList::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
    public function dispatchCall ($params)
    {
        $req = new GetBidderListRequestType();
		
        $res = $this->proxy->GetBidderList($req);
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

$x = new sample_GetBidderList();
$x->dispatchCall(array());
?>