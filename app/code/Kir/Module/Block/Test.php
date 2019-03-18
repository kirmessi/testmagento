<?php
/**
 * Created by PhpStorm.
 * User: kir
 * Date: 3/18/19
 * Time: 12:40 PM
 */

namespace Kir\Module\Block;

use Magento\Framework\View\Element\Template;

class Test extends Template
{
	public function __construct(\Magento\Framework\View\Element\Template\Context $context)
	{
		parent::__construct($context);
	}

	public function testmessage($name)
	{
		return __('<h1>'.$name.'</h1>');
	}

	public function buymessage()
	{
		return __('<h2>Test message</h2>');
	}

	public function hellomessage()
	{
		return __('<h3>Test, Hello </h3>');
	}

	public function oopsmessage($name)
	{
		return __('<h4>'.$name.'</h4>');
	}
}