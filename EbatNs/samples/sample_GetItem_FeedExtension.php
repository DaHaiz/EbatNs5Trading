<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetItemRequestType.php';
require_once 'EbatNs_Environment.php';
require_once 'EbatNs_OutputSelectorModel.php';

/**
 * sample_GetItem_FeedExtension
 * 
 * Sample call for GetItem_FeedExtension
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetItem_FeedExtension.php,v 1.107 2012-09-10 11:01:20 michaelcoslar Exp $
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
		$modelTiny = new EbatNs_OutputSelectorModel('tiny');
		$modelTiny->addSelector(new EbatNs_OutputSelector(array('Item.ItemID')));
		$this->proxy->addSelectorModel('GetItem', $modelTiny, true);

		$this->proxy->setParserOption('NO_UNSET_METADATA', true);
		$this->proxy->setParserOption('NO_REDUCE', true);
		
        $req = new GetItemRequestType();
        $req->setItemID($params['ItemId']);
        
        $res = $this->proxy->GetItem($req);
        if ($this->testValid($res))
        {
			$res->_elements['FeedExtension'] = array 
			(
				'required' => false,
				'type' => 'string',
				'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
				'array' => false,
				'cardinality' => '0..1'
			);

			$res->FeedExtension = 'Some dummy content for demonstration';
	
			header('Content-Type: text/xml');
			echo '<?xml version="1.0" encoding="utf-8"?>';
			echo ($res->serialize('GetItemResponse_Extended', $res, null, true, null, new EbatNs_DataConverterIso()));

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