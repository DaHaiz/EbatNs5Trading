<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetPromotionRulesRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetPromotionRules
 * 
 * Sample call for GetPromotionRules
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetPromotionRules.php,v 1.107 2012-09-10 11:01:21 michaelcoslar Exp $
 * @access public
 */
class sample_GetPromotionRules extends EbatNs_Environment
{

    /**
     * sample_GetPromotionRules::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
	public function dispatchCall ($params)
    {
        $req = new GetPromotionRulesRequestType();
        $req->setPromotionMethod($params['PromotionMethod']);
        
        $res = $this->proxy->GetPromotionRules($req);
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

$x = new sample_GetPromotionRules();
$x->dispatchCall
(
	array
	(
		'PromotionMethod' => 'CrossSell'
	)
);

?>