<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetCrossPromotionsRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetCrossPromotions
 * 
 * Sample call for GetCrossPromotions
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetCrossPromotions.php,v 1.107 2012-09-10 11:01:20 michaelcoslar Exp $
 * @access public 
 */
class sample_GetCrossPromotions extends EbatNs_Environment
{

   /**
     * sample_GetCrossPromotions::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
	public function dispatchCall ($params)
    {
        $req = new GetCrossPromotionsRequestType();
        $req->setItemID($params['ItemID']);
        $req->setPromotionMethod($params['PromotionMethod']);
        
        $res = $this->proxy->GetCrossPromotions($req);
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

$x = new sample_GetCrossPromotions();
$x->dispatchCall
(
	array
	(
		'ItemID' => '110032133772',
		'PromotionMethod' => 'CrossSell'
	)
);

?>