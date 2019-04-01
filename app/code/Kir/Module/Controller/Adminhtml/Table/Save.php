<?php
namespace Kir\Module\Controller\Adminhtml\Table;
class Save extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Kir_Module::table';
    protected $resultPageFactory;
    protected $tableFactory;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Kir\Module\Model\TestModelFactory $tableFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->tableFactory = $tableFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if($data)
        {
            try{
                $id = $data['id'];
                $contact = $this->tableFactory->create()->load($id);
                $data = array_filter($data, function($value) {return $value !== ''; });
                $contact->setData($data);
                $contact->save();
                $this->messageManager->addSuccess(__('Successfully saved the item.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                return $resultRedirect->setPath('*/*/');
            }
            catch(\Exception $d)
            {
                $this->messageManager->addError($e->getMessage());
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData($data);
                return $resultRedirect->setPath('*/*/edit', ['id' => $contact->getId()]);
            }
        }
        return $resultRedirect->setPath('*/*/');
    }
}