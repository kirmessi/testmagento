<?php

namespace Kir\Module\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class TestModel extends AbstractDb {

  protected function _construct() {
    $this->_init('a_custom_magento', 'id');
  }
}
