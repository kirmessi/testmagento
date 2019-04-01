<?php
namespace Kir\Module\Block\Adminhtml\Table\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Customer\Block\Adminhtml\Edit\GenericButton;

class DeleteButton extends GenericButton implements ButtonProviderInterface
{
    public function getButtonData()
    {
        return [
            'label' => __('Delete Item'),
            'on_click' => 'deleteConfirm(\'' . __('Are you sure you want to delete this item?') . '\', \'' . $this->getDeleteUrl() . '\')',
            'class' => 'delete',
            'sort_order' => 20
        ];
    }
    public function getDeleteUrl()
    {
        $urlInterface = \Magento\Framework\App\ObjectManager::getInstance()->get('Magento\Framework\UrlInterface');
        $url = $urlInterface->getCurrentUrl();
        $parts = explode('/', parse_url($url, PHP_URL_PATH));
        $id = $parts[6];
        return $this->getUrl('*/*/delete', ['id' => $id]);
    }
}