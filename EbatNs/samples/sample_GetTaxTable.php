<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'GetTaxTableRequestType.php';
require_once 'EbatNs_Environment.php';

/**
 * sample_GetTaxTable
 * 
 * Sample call for GetTaxTable
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetTaxTable.php,v 1.107 2012-09-10 11:01:21 michaelcoslar Exp $
 * @access public
 */
class sample_GetTaxTable extends EbatNs_Environment
{

   /**
     * sample_GetTaxTable::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     * 
     * @return boolean success
     */
	public function dispatchCall ($params)
    {
        $req = new GetTaxTableRequestType();
        
        $res = $this->proxy->GetTaxTable($req);
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

$x = new sample_GetTaxTable();
$x->dispatchCall(array());

?>