<?php
namespace Kir\Module\Block;
class Product extends \Magento\Framework\View\Element\Template
{
    protected $_categoryFactory;
    protected $helper;
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Catalog\Model\CategoryFactory $categoryFactory,
        \Kir\Module\Model\Helper\Data $helper,
        array $data = []
    )
    {   $this->helper = $helper;
        $this->_categoryFactory = $categoryFactory;
        parent::__construct($context, $data);
    }

    public function getCategory()

    {   $productslist =$this->helper->getConfig();
        $category = $this->_categoryFactory->create();
        $category->load($productslist);
        return $category;
    }

    public function getCategoryProducts()

    {
      $productslist =$this->helper->getConfig();
       $products = $this->getCategory($productslist)->getProductCollection();
        $products->addAttributeToSelect('*');
        return $products;
    }
}