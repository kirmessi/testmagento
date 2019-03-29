<?php
namespace Kir\Module\Controller\Table;
class Index extends \Magento\Framework\App\Action\Action
{
  protected $_pageFactory;
  protected $_tableFactory;
  protected $_testTableFactory;
  public function __construct(
    \Magento\Framework\App\Action\Context $context,
    \Magento\Framework\View\Result\PageFactory $pageFactory,
    \Magento\Framework\Controller\Result\JsonFactory $tableFactory,
    \Kir\Module\Model\ResourceModel\TestModel\CollectionFactory $testTableFactory
  )
  {
    $this->_pageFactory = $pageFactory;
    $this->_tableFactory = $tableFactory;
    $this->_testTableFactory = $testTableFactory;
    return parent::__construct($context);
  }
  public function execute()
  {
    return $this->_tableFactory->create()->setData($this->_testTableFactory->create());
  }
}