<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetStoreCategoryUpdateStatusRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetStoreCategoryUpdateStatus
 * 
 * Sample call for GetStoreCategoryUpdateStatus
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetStoreCategoryUpdateStatus.php,v 1.107 2012-09-10 11:01:21 michaelcoslar Exp $
 * @access public
 */
class sample_GetStoreCategoryUpdateStatus extends EbatNs_Environment
{

   /**
     * sample_GetStoreCategoryUpdateStatus::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
	public function dispatchCall ($params)
    {
        $req = new GetStoreCategoryUpdateStatusRequestType();
        $req->setTaskID($params['TaskID']);
        
        $res = $this->proxy->GetStoreCategoryUpdateStatus($req);
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

$x = new sample_GetStoreCategoryUpdateStatus();
$x->dispatchCall
(
	array
	(
		'TaskID' => 'dummyTaskID'
	)
);

?>