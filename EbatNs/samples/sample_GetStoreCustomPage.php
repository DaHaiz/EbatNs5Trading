<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetStoreCustomPageRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetStoreCustomPage
 * 
 * Sample call for GetStoreCustomPage
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetStoreCustomPage.php,v 1.107 2012-09-10 11:01:21 michaelcoslar Exp $
 * @access public
 */
class sample_GetStoreCustomPage extends EbatNs_Environment
{

   /**
     * sample_GetStoreCustomPage::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
	public function dispatchCall ($params)
    {
        $req = new GetStoreCustomPageRequestType();
        
        $res = $this->proxy->GetStoreCustomPage($req);
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

$x = new sample_GetStoreCustomPage();
$x->dispatchCall(array());

?>