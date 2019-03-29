<?php
namespace Kir\Module\Block\Adminhtml\Table\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Customer\Block\Adminhtml\Edit\GenericButton;

class SaveButton extends GenericButton implements ButtonProviderInterface
{
  public function getButtonData()
  {
    return [
      'label' => __('Save Contact'),
      'class' => 'save primary',
      'data_attribute' => [
        'mage-init' => ['button' => ['event' => 'save']],
        'form-role' => 'save',
      ],
      //'on_click' => sprintf("location.href= '%s';", $this->getSaveUrl()),
      'sort_order' => 90
    ];
  }

  public function getSaveUrl()
  {
    return $this->getUrl('*/*/save', []) ;
  }
}