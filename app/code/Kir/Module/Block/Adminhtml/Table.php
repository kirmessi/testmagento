<?php
namespace Kir\Module\Block\Adminhtml;

class Table extends \Magento\Backend\Block\Widget\Grid\Container
{

    protected function _construct()
    {
        $this->_controller = 'adminhtml_table';
        $this->_blockGroup = 'Kir_Module';
        $this->_headerText = __('Table');
        $this->_addButtonLabel = __('Create New data');
        parent::_construct();
    }
}
