<?php

namespace Kir\Module\Ui\Component;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;

class TableAction extends \Magento\Ui\Component\Listing\Columns\Column {

  protected $urlBuilder;

  public function __construct(ContextInterface $context, UiComponentFactory $uiComponentFactory, UrlInterface $urlBuilder, array $components = [], array $data = []) {
    $this->urlBuilder = $urlBuilder;
    parent::__construct($context, $uiComponentFactory, $components, $data);
  }

  public function prepareDataSource(array $dataSource) {
    if (isset($dataSource['data']['items'])) {
      foreach ($dataSource['data']['items'] as &$item) {
        $item[$this->getData('name')]['edit'] = [
          'href' => $this->urlBuilder->getUrl('table/table/edit', ['id' => $item['id']]),
          'label' => __('Edit'),
          'hidden' => FALSE,
        ];
        $item[$this->getData('name')]['delete'] = [
          'href' => $this->urlBuilder->getUrl('table/table/delete', ['id' => $item['id']]),
          'label' => __('Delete'),
          'hidden' => FALSE,
        ];
      }
    }
    return $dataSource;
  }
}