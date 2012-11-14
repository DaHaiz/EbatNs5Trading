<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'AddMemberMessageAAQToPartnerRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_AddMemberMessageAAQToPartner
 * 
 * Sample call for AddMemberMessageAAQToPartner
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_AddMemberMessageAAQToPartner.php,v 1.107 2012-09-10 11:01:19 michaelcoslar Exp $
 * @access public 
 */
class sample_AddMemberMessageAAQToPartner extends EbatNs_Environment
{

    /**
     * sample_AddMemberMessageAAQToPartner::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
    public function dispatchCall ($params)
    {
        $req = new AddMemberMessageAAQToPartnerRequestType();
        $req->setItemID($params['ItemID']);
        
        $MemberMessage = new MemberMessageType();
        $MemberMessage->setBody($params['Body']);
        $MemberMessage->setRecipientID($params['RecipientID']);
        $MemberMessage->setSubject($params['Subject']);
        
        $req->setMemberMessage($MemberMessage);
        
        $res = $this->proxy->AddMemberMessageAAQToPartner($req);
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

$x = new sample_AddMemberMessageAAQToPartner();
$x->dispatchCall
(
	array
	(
		'ItemID' => '234',
		'Body' => 'dummy',
		'RecipientID' => 'dummy',
		'Subject' => 'dummy Subject'
	)
);
?>