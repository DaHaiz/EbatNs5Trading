<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetCategorySpecificsRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetCategorySpecifics
 * 
 * Sample call for GetCategorySpecifics
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetCategorySpecifics.php,v 1.107 2012-09-10 11:01:20 michaelcoslar Exp $
 * @access public 
 */
class sample_GetCategorySpecifics extends EbatNs_Environment
{

   /**
     * sample_GetCategorySpecifics::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
	public function dispatchCall ($params)
    {
        $req = new GetCategorySpecificsRequestType();
        $req->setCategoryID($params['CategoryID']);
        
        $res = $this->proxy->GetCategorySpecifics($req);
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

$x = new sample_GetCategorySpecifics();
$x->dispatchCall
(
	array
	(
		'CategoryID' => '8267'
	)
);

?>