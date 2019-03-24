<?php
namespace Kir\Module\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
  public function upgrade( SchemaSetupInterface $setup, ModuleContextInterface $context ) {
    $installer = $setup;

    $installer->startSetup();
    if(version_compare($context->getVersion(), '2.2.1', '<=')) {
      $table = $installer->getConnection()
        ->newTable($installer->getTable('a_custom_magento'))
        ->addColumn(
          'id',
          \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
          null,
          ['identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true],
          'Id'
        )->addColumn(
          'title',
          \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
          255,
          ['nullable' => false],
          'Title'
        )->addColumn(
          'content',
          \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
          '2M',
          [],
          'Content'
        )->addColumn(
          'created_at',
          \Magento\Framework\Db\Ddl\Table::TYPE_TIMESTAMP,
          null,
          ['nullable' => false, 'default' => \Magento\Framework\Db\Ddl\Table::TIMESTAMP_INIT],
          'Created At'
        );
      $installer->getConnection()->createTable($table);
    }

    $installer->endSetup();
  }
}