<?php

namespace app\modules;


class MyStackElement
{
	public $value;
	public $next = null;
	public $prev;

	public function __construct($value, MyStackElement $prevValue = null)
	{
		$this->value = $value;
		if (is_null($prevValue)) {
			$this->prev = null;
		} else {
			$this->prev = &$prevValue;
			$this->prev->next = &$this;
		}
	}
}