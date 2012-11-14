<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'AddItemRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_AddItem
 * 
 * Sample call for AddItem
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_AddItem.php,v 1.107 2012-09-10 11:01:19 michaelcoslar Exp $
 * @access public 
 */
class sample_AddItem extends EbatNs_Environment
{
	/**
     * sample_AddItem::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
    public function dispatchCall ($params)
    {
        $req = new AddItemRequestType();

        $item = new ItemType();
        $item->setTitle($params['Title']);
        $item->setQuantity($params['Quantity']);
        $item->setCurrency($params['Currency']);
        $item->setCountry($params['Country']);
        $item->setStartPrice($params['StartPrice']);
        $item->setListingDuration($params['ListingDuration']);
        $item->setLocation($params['Location']);
        $item->setPaymentMethods($params['PaymentMethods']);
        $item->setListingType($params['ListingType']);
        $item->setDescription($params['Description']);
        
        $primaryCategory = new CategoryType();
        $primaryCategory->setCategoryID($params['CategoryID']);
        $item->setPrimaryCategory($primaryCategory);
		
        $req->setItem($item);
        
        $res = $this->proxy->AddItem($req);
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

$x = new sample_AddItem();

$x->dispatchCall
(
	array
	(
		'Title' => 'iPod',
		'Quantity' => '1',
		'Currency' => 'EUR',
		'Country' => 'DE',
		'StartPrice' => '5.00',
		'ListingDuration' => 'Days_7',
		'Location' => 'Cologne',
		'PaymentMethods' => 'CashOnPickup',
		'ListingType' => 'Chinese',
		'Description' => 'Enter Description Here',
		'CategoryID' => '8267',
	)
);

?>
