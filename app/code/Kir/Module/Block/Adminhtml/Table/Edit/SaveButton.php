<?php
namespace Kir\Module\Block\Adminhtml\Table\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Catalog\Block\Adminhtml\Product\Edit\Button\Generic as GenericButton;

class SaveButton extends GenericButton implements ButtonProviderInterface
{
    public function getButtonData()
    {
        return [
            'label' => __('Save Item'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
             'sort_order' => 90
        ];
    }
    public function getSaveUrl()
    {
        return $this->getUrl('*/*/save', []) ;
    }
}