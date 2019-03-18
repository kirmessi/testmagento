<?php

namespace Kir\Module\Block;

use Kir\Module\Block\Test;

class TestSecond extends Test
{
	public function testmessage($name)
	{
		return __('<h1>'.$name.'</h1>');
	}

	public function buymessage()
	{
		return __('<h2>Buy, Magento</h2>');
	}

}