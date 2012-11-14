<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetOrdersRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetOrders
 * 
 * Sample call for GetOrders
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetOrders.php,v 1.107 2012-09-10 11:01:21 michaelcoslar Exp $
 * @access public 
 */
class sample_GetOrders extends EbatNs_Environment
{

   /**
     * sample_GetOrders::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
    public function dispatchCall ($params)
    {
        $req = new GetOrdersRequestType();
        $req->setCreateTimeFrom($params['CreateTimeFrom']);
        $req->setCreateTimeTo($params['CreateTimeTo']);
        $req->setOrderRole($params['OrderRole']);
        $req->setOrderStatus($params['OrderStatus']);
		
        $res = $this->proxy->GetOrders($req);
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

$x = new sample_GetOrders();
$x->dispatchCall
(
	array
	(
		'CreateTimeFrom' => '2008-05-27 15:00',
		'CreateTimeTo' => '2008-05-28 15:00',
		'OrderRole' => 'Seller',
		'OrderStatus' => 'Active'
	)
);
?>
