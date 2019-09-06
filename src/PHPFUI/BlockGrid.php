<?php

namespace PHPFUI;

class BlockGrid extends HTML5Element
	{
	protected $large = 0;
	protected $medium = 0;

	protected $small = 0;

	public function __construct($small = 0, $medium = 0, $large = 0)
		{
		parent::__construct('ul');
		$this->small = $small;
		$this->medium = $medium;
		$this->large = $large;
		}

	public function addBlock($text) : void
		{
		$this->add("<li>{$text}</li>");
		}

	public function setLarge($number)
		{
		$this->large = (int) $number;

		return $this;
		}

	public function setMedium($number)
		{
		$this->medium = (int) $number;

		return $this;
		}

	public function setSmall($number)
		{
		$this->small = (int) $number;

		return $this;
		}

	protected function getStart() : string
		{
		$this->makeClass('small', $this->small);
		$this->makeClass('medium', $this->medium);
		$this->makeClass('large', $this->large);
		$this->addClass('columns');

		return parent::getStart();
		}

	protected function makeClass($size, $setting) : void
		{
		if ($setting)
			{
			$this->addClass("{$size}-block-grid-{$setting}");
			}
		}

	}
