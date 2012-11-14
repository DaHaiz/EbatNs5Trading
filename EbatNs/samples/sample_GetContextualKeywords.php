<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetContextualKeywordsRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetContextualKeywords
 * 
 * Sample call for GetContextualKeywords
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetContextualKeywords.php,v 1.107 2012-09-10 11:01:20 michaelcoslar Exp $
 * @access public 
 */
class sample_GetContextualKeywords extends EbatNs_Environment
{

   /**
     * sample_GetContextualKeywords::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
	public function dispatchCall ($params)
    {
        $req = new GetContextualKeywordsRequestType();
        $req->setEncoding($params['Encoding']);
        $req->setURL($params['URL']);
        
        $res = $this->proxy->GetContextualKeywords($req);
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

$x = new sample_GetContextualKeywords();
$x->dispatchCall
(
	array
	(
		'Encoding' => 'ISO-8859-1',
		'URL' => 'http://www.phoons.com/formaloutfit.html'
	)
);

?>