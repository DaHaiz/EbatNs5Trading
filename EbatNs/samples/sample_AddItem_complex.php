<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'AddItemRequestType.php';
require_once 'UploadSiteHostedPicturesRequestType.php';
require_once 'PictureSetCodeType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_AddItem_complex
 * 
 * Sample call for AddItem_complex
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann
 * @copyright Copyright (c) 2008
 * @version $Id: sample_AddItem_complex.php,v 1.107 2012-09-10 11:01:19 michaelcoslar Exp $
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
        $reqPic = new UploadSiteHostedPicturesRequestType();

		$reqPic->setPictureData(file_get_contents("/var/www/apache2-default/playground/johann/php5/Fotolia.jpg"));
        $reqPic->setPictureSet(PictureSetCodeType::CodeType_Supersize);
		     
        $resPic = $this->proxy->UploadSiteHostedPictures($reqPic);
        if ($this->testValid($resPic))
        {
			$pictureUrl = $resPic->getSiteHostedPictureDetails()->getFullURL();
			
			$reqItem = new AddItemRequestType();

			$item = new ItemType();
			$item->setTitle('ipod');
			$item->setQuantity(1);
			$item->setCurrency('EUR');
			$item->setCountry('DE');
			$item->setStartPrice('5.00');
			$item->setListingDuration('Days_7');
			$item->setLocation('Cologne');
			$item->setPaymentMethods('CashOnPickup');
			$item->setListingType('Chinese');
			$item->setDescription('Neuer iPod mit Kopfhörer Ladekabel und Pc-Anschlusskabel.');
			$item->setSubTitle('Brandneuer iPod Mini!');
			$item->setHitCounter('BasicStyle');
			$item->setListingEnhancement('Highlight');
	        
			$listingDesigner = new ListingDesignerType();
			$listingDesigner->setLayoutID('7710001');
			$listingDesigner->setThemeID('7730714');
			$item->setListingDesigner($listingDesigner);
	        
			$primaryCategory = new CategoryType();
			$primaryCategory->setCategoryID(10610);
			$item->setPrimaryCategory($primaryCategory);
	        
			$secondaryCategory = new CategoryType();
			$secondaryCategory->setCategoryID(8267);
			$item->setSecondaryCategory($secondaryCategory);
			
			$picture = new PictureDetailsType();
			$picture->setPictureURL($pictureUrl);
			$item->setPictureDetails($picture);
	        
			$attSet = new AttributeSetType();
			$attSet->setTypeAttribute('attributeSetID', 1950);
				
			$att = new AttributeType();
			$att->setTypeAttribute('attributeID', 10244);
					
			$attValue = new ValType();
			$attValue->setValueID(10426);

			$att->setValue($attValue, 0);
			$attSet->setAttribute($att, 0);
			
			$atts = new AttributeSetArrayType();
			$atts->setAttributeSet($attSet, 0);

			$attSet2 = new AttributeSetType();
			$attSet2->setTypeAttribute('attributeSetID', 2136);
				
			$att2 = new AttributeType();
			$att2->setTypeAttribute('attributeID', 3803);
					
			$attValue2 = new ValType();
			$attValue2->setValueID(32040);

			$att2->setValue($attValue2, 0);
			
			$att3 = new AttributeType();
			$att3->setTypeAttribute('attributeID', 3806);
					
			$attValue3 = new ValType();
			$attValue3->setValueID(-3);
			$attValue3->setValueLiteral('siehe Artikelbeschreibung');

			$att3->setValue($attValue3, 0);
			
			$attSet2->setAttribute($att3, 1);
			
			$atts->setAttributeSet($attSet2, 1);

			$item->setAttributeSetArray($atts);
			
			$reqItem->setItem($item);
	        
			$resItem = $this->proxy->AddItem($reqItem);

			if ($this->testValid($resItem))
			{
				$this->dumpObject($resItem);
				return (true);
			}
			else 
			{
				return (false);
			}
        }
        else 
        {
            return (false);
        }
    }
}

$x = new sample_AddItem();
$x->dispatchCall(array());
?>