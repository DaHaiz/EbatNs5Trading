<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetUserDisputesRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetUserDisputes
 * 
 * Sample call for GetUserDisputes
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetUserDisputes.php,v 1.107 2012-09-10 11:01:21 michaelcoslar Exp $
 * @access public
 */
class sample_GetUserDisputes extends EbatNs_Environment
{

   /**
     * sample_GetUsetDisputes::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
	public function dispatchCall ($params)
    {
        $req = new GetUserDisputesRequestType();
        
        $Pagination = new PaginationType();
        $Pagination->setPageNumber($params['PageNumber']);
        $req->setPagination($Pagination);
        
        $res = $this->proxy->GetUserDisputes($req);
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

$x = new sample_GetUserDisputes();
$x->dispatchCall
(
	array
	(
		'PageNumber' => '3'
	)
);

?>