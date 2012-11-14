<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetProductSearchPageRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetProductSearchPage
 * 
 * Sample call for GetProductSearchPage
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetProductSearchPage.php,v 1.107 2012-09-10 11:01:21 michaelcoslar Exp $
 * @access public 
 */
class sample_GetProductSearchPage extends EbatNs_Environment
{

   /**
     * sample_GetProductSearchPage::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
	public function dispatchCall ($params)
    {
        $req = new GetProductSearchPageRequestType();
        
        $res = $this->proxy->GetProductSearchPage($req);
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

$x = new sample_GetProductSearchPage();
$x->dispatchCall(array());

?>