<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetProductFamilyMembersRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetProductFamilyMembers
 * 
 * Sample call for GetProductFamilyMembers
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetProductFamilyMembers.php,v 1.107 2012-09-10 11:01:21 michaelcoslar Exp $
 * @access public 
 */
class sample_GetProductFamilyMembers extends EbatNs_Environment
{

   /**
     * sample_GetProductFamilyMembers::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
	public function dispatchCall ($params)
    {
        $req = new GetProductFamilyMembersRequestType();
        
        $ProductSearch = new ProductSearchType();
        $ProductSearch->setProductID($params['ProductID']);
        $req->setProductSearch($ProductSearch);
        
        $res = $this->proxy->GetProductFamilyMembers($req);
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

$x = new sample_GetProductFamilyMembers();
$x->dispatchCall
(
	array
	(
		'ProductID' => '110032133300'
	)
);

?>