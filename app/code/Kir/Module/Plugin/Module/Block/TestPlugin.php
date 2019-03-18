<?php

namespace Kir\Module\Plugin\Module\Block;

use Kir\Module\Block\Test;

class TestPlugin
{
	public function beforeTestMessage(Test $subject, $name)
	{
		return ['(' . $name . ')'];
	}

	public function afterBuyMessage(Test $subject, $result)
	{
		return '|' . $result . '|';
	}

	public function aroundOopsmessage(Test $subject, callable $proceed)
	{
		echo __METHOD__ . " - Before proceed() </br>";
		$result = $proceed("Testing");
		echo __METHOD__ . " - After proceed() </br>";


		return $result;
    }
}