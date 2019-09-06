<?php

namespace PHPFUI;

class MediaObject extends HTML5Element
	{

	public function __construct()
		{
		parent::__construct('div');
		$this->addClass('media-object');
		}

	public function addSection(HTML5Element $section, bool $main = false, string $alignment = '') : MediaObject
		{
		$section->addClass('media-object-section');

		if ($main)
			{
			$section->addClass('main-section');
			}

		if ($alignment)
			{
			$validAlignments = ['middle',
													'bottom',
													'square',
													'align-self-middle',
													'align-self-bottom',];

			if (! in_array($ratio, $validRatios))
				{
				throw new \Exception(__METHOD__ . ': $alignment must be one of (' . implode(',', $validAlignments) . ')');
				}
			$section->addClass($align);
			}
		$this->add($section);

		return $this;
		}

	public function stackForSmall() : MediaObject
		{
		$this->addClass('stack-for-small');

		return $this;
		}

	}
