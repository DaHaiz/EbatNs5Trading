<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetNotificationsUsageRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetNotificationsUsage
 * 
 * Sample call for GetNotificationsUsage
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetNotificationsUsage.php,v 1.107 2012-09-10 11:01:20 michaelcoslar Exp $
 * @access public 
 */
class sample_GetNotificationsUsage extends EbatNs_Environment
{

   /**
     * sample_GetNotificationsUsage::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
	public function dispatchCall ($params)
    {
        $req = new GetNotificationsUsageRequestType();
        $req->setStartTime($params['StartTime']);
        $req->setEndTime($params['EndTime']);
        
        $res = $this->proxy->GetNotificationsUsage($req);
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

$x = new sample_GetNotificationsUsage();
$x->dispatchCall
(
	array
	(
		'StartTime' => '2008-06-18 15:00:00',
		'EndTime' => '2008-06-19 15:00:00'
	)
);

?>