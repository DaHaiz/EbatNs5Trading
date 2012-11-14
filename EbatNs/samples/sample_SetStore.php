<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'SetStoreRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_SetStore
 * 
 * Sample call for SetStore
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_SetStore.php,v 1.107 2012-09-10 11:01:22 michaelcoslar Exp $
 * @access public
 */
class sample_SetStore extends EbatNs_Environment
{

   /**
     * sample_SetStore::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
    public function dispatchCall ($params)
    {
        $req = new SetStoreRequestType();
		
        $res = $this->proxy->SetStore($req);
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

$x = new sample_SetStore();
$x->dispatchCall(array());
?>