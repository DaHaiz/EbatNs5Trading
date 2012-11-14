<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetItemRequestType.php';
require_once 'EbatNs_Environment.php';
require_once 'EbatNs_OutputSelectorModel.php';

/**
 * sample_GetItemOutputSelector
 * 
 * Sample call for GetItem_OutputSelector
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetItem_OutputSelector.php,v 1.107 2012-09-10 11:01:20 michaelcoslar Exp $
 * @access public 
 */
class sample_GetItem extends EbatNs_Environment
{

   /**
     * sample_GetItem::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
    public function dispatchCall ($params)
    {
		$modelSmall = new EbatNs_OutputSelectorModel('small');
		$modelSmall->addSelector(new EbatNs_OutputSelector(array('Item.ItemID', 'Item.ListingDetails.StartTime')));
		$this->proxy->addSelectorModel('GetItem', $modelSmall, false);

		$modelTiny = new EbatNs_OutputSelectorModel('tiny');
		$modelTiny->addSelector(new EbatNs_OutputSelector(array('Item.ItemID')));
		$this->proxy->addSelectorModel('GetItem', $modelTiny, true);

		//$this->proxy->setActiveSelectorModel('small');
		$this->proxy->setActiveSelectorModel('tiny');
		
        $req = new GetItemRequestType();
        $req->setItemID($params['ItemId']);
        
        $res = $this->proxy->GetItem($req);
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

$x = new sample_GetItem();
$x->dispatchCall
(
	array
	(
		'ItemId' => '110031429807'
	)
);
?>
