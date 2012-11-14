<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetSellerTransactionsRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetSellerTransactions
 * 
 * Sample call for GetSellerTransactions
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetSellerTransactions.php,v 1.107 2012-09-10 11:01:21 michaelcoslar Exp $
 * @access public
 */
class sample_GetSellerTransactions extends EbatNs_Environment
{

   /**
     * sample_GetSellerTransactions::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
    public function dispatchCall ($params)
    {
        $req = new GetSellerTransactionsRequestType();
		
        $res = $this->proxy->GetSellerTransactions($req);
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

$x = new sample_GetSellerTransactions();
$x->dispatchCall(array());
?>