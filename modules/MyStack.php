<?php

namespace app\modules;


class MyStack
{
	public ?MyStackElement $first;
	public ?MyStackElement $last;

	public function __construct()
	{
		$this->first = null;
		$this->last = null;
	}

	public function isEmpty()
	{
		return $this->first == null;
	}

	public function push($value)
	{
		if (!$this->isEmpty()) {
			$this->last = new MyStackElement($value,$this->last);
		} else {
			$this->last = new MyStackElement($value);
			$this->first = $this->last;
		}
	}

	public function pop()
	{
		if (!$this->isEmpty()) {
			$pop = $this->top();
			$this->last = $this->last->prev;
			if (is_null($this->last)) {
				$this->first = null;
			} else {
				$this->last->next = null;
			}
			return $pop;
		} else {
			return null;
		}
	}

	public function first()
	{
		return $this->first->value;
	}

	public function top()
	{
		return $this->last->value;
	}
}