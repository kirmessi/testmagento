<?php
namespace Kir\Module\Model\Table;
use Kir\Module\Model\ResourceModel\TestModel\CollectionFactory;
use Kir\Module\Model\TestModel;
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $collection;
    protected $_loadedData;
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $contactCollectionFactory,
        array $meta = [],
        array $data = []
    ){
        $this->collection = $contactCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }
    public function getData()
    {
        if(isset($this->_loadedData)) {
            return $this->_loadedData;
        }
        $items = $this->collection->getItems();
        foreach($items as $contact)
        {
            $this->_loadedData[$contact->getId()] = $contact->getData();
        }
        return $this->_loadedData;
    }
}