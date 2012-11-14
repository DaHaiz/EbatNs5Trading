<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetMemberMessagesRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetMemberMessages
 * 
 * Sample call for GetMemberMessages
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetMemberMessages.php,v 1.107 2012-09-10 11:01:20 michaelcoslar Exp $
 * @access public 
 */
class sample_GetMemberMessages extends EbatNs_Environment
{

   /**
     * sample_GetMemberMessages::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
	public function dispatchCall ($params)
    {
        $req = new GetMemberMessagesRequestType();
        $req->setMailMessageType($params['MailMessageType']);
        
        $pagination = new PaginationType();
        $pagination->setEntriesPerPage($params['pagination']['EntriesPerPage']);
        $pagination->setPageNumber($params['pagination']['PageNumber']);
        $req->setPagination($pagination);
        
        $res = $this->proxy->GetMemberMessages($req);
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

$x = new sample_GetMemberMessages();
$x->dispatchCall
(
	array
	(
		'MailMessageType' => 'All',
		'pagination' => 
		array
		(
			'EntriesPerPage' => '25',
			'PageNumber' => '1'
		)
	)
);

?>