<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'AddToItemDescriptionRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_AddToItemDescription
 * 
 * Sample call for AddToItemDescription
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_AddToItemDescription.php,v 1.107 2012-09-10 11:01:20 michaelcoslar Exp $
 * @access public 
 */
class sample_AddToItemDescription extends EbatNs_Environment
{

   /**
     * sample_AddToItemDescription::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
    public function dispatchCall ($params)
    {
        $req = new AddToItemDescriptionRequestType();
        $req->setItemID($params['ItemID']);
        $req->setDescription($params['Description']);
		
        $res = $this->proxy->AddToItemDescription($req);
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

$x = new sample_AddToItemDescription();
$x->dispatchCall
(
	array
	(
		'ItemID' => '110031854626',
		'Description' => 'Test-iPod'
	)
);
?>