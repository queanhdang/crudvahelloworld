<?php

namespace AHT\Blog\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeData implements UpgradeDataInterface
{
	protected $_postFactory;

	public function __construct(\AHT\Blog\Model\PostFactory $postFactory)
	{
		$this->_postFactory = $postFactory;
	}

	public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		if (version_compare($context->getVersion(), '1.5.5', '<')) {
			$data = [
				'name'         => "dqa2",
				'content' => "hehehehheee2",
				'url_key'      => '/magento-2-module-development/magento-2-events.html',
				'image'         => 'dqa2',
				'status'       => 0
			];
			$post = $this->_postFactory->create();
			$post->addData($data)->save();
		}
	}
}
