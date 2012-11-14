<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GeteBayOfficialTimeRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GeteBayOfficialTime
 * 
 * Sample call for GeteBayOfficalTime
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GeteBayOfficialTime.php,v 1.107 2012-09-10 11:01:22 michaelcoslar Exp $
 * @access public 
 */
class sample_GeteBayOfficialTime extends EbatNs_Environment
{

   /**
     * sample_GeteBayOfficialTime::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
    public function dispatchCall ($params)
    {
        $req = new GeteBayOfficialTimeRequestType();
		
        $res = $this->proxy->GeteBayOfficialTime($req);
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

$x = new sample_GeteBayOfficialTime();
$x->dispatchCall(array());
?>
