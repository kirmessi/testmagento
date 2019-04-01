<?php

 namespace Kir\Module\Model;

 use \Magento\Framework\Model\AbstractModel;

 class TestModel extends AbstractModel {

   protected function _construct() {
     $this->_init('Kir\Module\Model\ResourceModel\TestModel');
   }
 }
