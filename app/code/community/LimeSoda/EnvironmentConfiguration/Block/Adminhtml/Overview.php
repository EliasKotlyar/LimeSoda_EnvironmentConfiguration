<?php

class LimeSoda_EnvironmentConfiguration_Block_Adminhtml_Overview extends Mage_Adminhtml_Block_Widget_Container
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_headerText = Mage::helper('limesoda_environmentconfiguration')->__('Environment Configuration');
        parent::_construct();
    }

    /**
     * @param string $command
     * @return string
     */
    public function renderCommand($command)
    {
        $commandEscaped = $this->escapeHtml($command);
        $helper = Mage::helper('limesoda_environmentconfiguration');

        $pattern = $helper->getVariableRegex();
        $replacement = '<span class="variable-missing" title="' .
                       $helper->__('Variable ${1} was not defined for this environment.') .
                       '">${1}</span>';
        return preg_replace($pattern, $replacement, $commandEscaped);
    }

}
