<?php

namespace Shatilo\MyModule\Controller\Adminhtml\Table;

use Kir\Module\Model\TestModel as Table;

class Delete extends \Magento\Backend\App\Action {

  const ADMIN_RESOURCE = 'Kir_Module::table';

  protected $resultPageFactory;

  protected $tableFactory;

  public function __construct(
    \Magento\Backend\App\Action\Context $context,
    \Magento\Framework\View\Result\PageFactory $resultPageFactory,
    \Kir\Module\Model\TestModelFactory $tableFactory
  ) {
    $this->resultPageFactory = $resultPageFactory;
    $this->tableFactory = $tableFactory;
    parent::__construct($context);
  }

  public function execute() {
    $id = $this->getRequest()->getParam('id');
    $contact = $this->tableFactory->create()->load($id);
    if (!$contact) {
      $this->messageManager->addError(__('Unable to process. please, try again.'));
      $resultRedirect = $this->resultRedirectFactory->create();
      return $resultRedirect->setPath('*/*/', ['_current' => TRUE]);
    }
    try {
      $contact->delete();
      $this->messageManager->addSuccess(__('Your item has been deleted !'));
    } catch (\Exception $e) {
      $this->messageManager->addError(__('Error while trying to delete item'));
      $resultRedirect = $this->resultRedirectFactory->create();
      return $resultRedirect->setPath('*/*/index', ['_current' => TRUE]);
    }
    $resultRedirect = $this->resultRedirectFactory->create();
    return $resultRedirect->setPath('*/*/index', ['_current' => TRUE]);
  }
}