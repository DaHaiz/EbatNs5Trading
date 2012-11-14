<?php
set_include_path(get_include_path() . ':' . dirname(__FILE__) . '/EbatNs');

/**
 * sources
 */
require_once 'AddItemRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_AddItem_advanced
 * 
 * Sample call for AddItem_advanced
 * 
 * @package ebatns
 * @subpackage samples
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_AddItem_advanced.php,v 1.107 2012-09-10 11:01:19 michaelcoslar Exp $
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
        $item->setSubTitle($params['SubTitle']);
        $item->setHitCounter($params['HitCounter']);
        $item->setListingEnhancement($params['ListingEnhancement']);
        
        $listingDesigner = new ListingDesignerType();
        $listingDesigner->setLayoutID($params['LayoutID']);
        $listingDesigner->setThemeID($params['ThemeID']);
        $item->setListingDesigner($listingDesigner);
        
        $primaryCategory = new CategoryType();
        $primaryCategory->setCategoryID($params['CategoryID']);
        $item->setPrimaryCategory($primaryCategory);
        
        $secondaryCategory = new CategoryType();
        $secondaryCategory->setCategoryID($params['secondaryCategoryID']);
        $item->setSecondaryCategory($secondaryCategory);
		
        $picture = new PictureDetailsType();
        $picture->setPictureURL($params['PictureURL']);
        $item->setPictureDetails($picture);
        
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
		'SubTitle' => 'Enter SubTitle Here',
		'HitCounter' => 'BasicStyle',
		'ListingEnhancement' => 'Highlight',
		'LayoutID' => '7710001',
		'ThemeID' => '7730714',
		'CategoryID' => '8267',
		'secondaryCategoryID' => '10610',
		'PictureURL' => 'http://fc03.deviantart.com/fs5/i/2004/315/3/5/ipod_by_ilikequavers.jpg'
	)
);
?>