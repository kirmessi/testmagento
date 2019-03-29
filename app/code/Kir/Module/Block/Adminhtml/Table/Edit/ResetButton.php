<?php
namespace Kir\Module\Block\Adminhtml\Table\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Customer\Block\Adminhtml\Edit\GenericButton;

class ResetButton extends GenericButton implements ButtonProviderInterface
{
  public function getButtonData()
  {
    return [
      'label' => __('Reset'),
      'on_click' => 'javascript: location.reload();',
      'class' => 'reset',
      'sort_order' => 30
    ];
  }
}