<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetPopularKeywordsRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetPopularKeywords
 * 
 * Sample call for GetPopularKeywords
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetPopularKeywords.php,v 1.107 2012-09-10 11:01:21 michaelcoslar Exp $
 * @access public 
 */
class sample_GetPopularKeywords extends EbatNs_Environment
{

   /**
     * sample_GetPopularKeywords::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
    public function dispatchCall ($params)
    {
        $req = new GetPopularKeywordsRequestType();
		
        $res = $this->proxy->GetPopularKeywords($req);
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

$x = new sample_GetPopularKeywords();
$x->dispatchCall(array());
?>