<?php

namespace Kir\Module\Model\ResourceModel\TestModel;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection {

  protected function _construct() {
    parent::_construct();
    $this->_init(
      'Kir\Module\Model\TestModel',
      'Kir\Module\Model\ResourceModel\TestModel'
    );
  }
}
