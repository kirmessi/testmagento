<?php

namespace Kir\Module\Model\Helper;


class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
  protected $config_path='section_id/group_id/field_id';
  public function getConfig()
  {
    return $this->scopeConfig->getValue(
      $this->config_path,
      \Magento\Store\Model\ScopeInterface::SCOPE_STORE
    );
  }
}