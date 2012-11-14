<?php
/**
 * sources
 */
require_once 'setincludepath.php';
require_once 'EbatNs_CharacteristicSetDependencyLinker.php';
require_once 'EbatNs_Environment.php';
require_once 'phpCSRenderer/CsRendererPEAR.php';

/**
 * sample_GetAttributeSet
 * 
 * Sample call for GetAttributeSet
 * 
 * @package ebatns
 * @subpackage samples_trading
 * @author johann 
 * @copyright Copyright (c) 2008
 * @version $Id: sample_GetAttributeSet_Rendered.php,v 1.107 2012-09-10 11:01:20 michaelcoslar Exp $
 * @access public 
 */
class sample_GetAttributeSet extends EbatNs_Environment
{

   /**
     * sample_GetAttributeSet::dispatchCall()
     * 
     * Dispatch the call
     *
     * @param array $params array of parameters for the eBay API call
     */
    public function dispatchCall ($params)
    {
		$csdl = new EbatNs_CharacteristicSetDependencyLinker($this->proxy);
		$csdl->fetchByCsSetId($params['CsSetID']);

		$csRenderer = new CsRendererPEAR($csdl->getCharactericsSet($params['CsSetID']));

		$form = $csRenderer->render();

		echo $form->toHtml();

		if ($csRenderer->needClientSideInit())
		{
			echo $csRenderer->renderClientSideInit();
		}
    }
}

$x = new sample_GetAttributeSet();
$x->dispatchCall
(
	array
	(
		'CsSetID' => '1950'
	)
);
?>