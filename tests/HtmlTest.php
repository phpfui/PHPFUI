<?php

/**
 * This file is part of the PHPFUI package
 *
 * (c) Bruce Wells
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source
 * code
 */
class HtmlTest extends \PHPFUI\HTMLUnitTester\Extensions
	{
	private $ks;

	private $page;

	public function setUp() : void
		{
		$this->page = new \PHPFUI\Page();
		$this->ks = new \PHPFUI\KitchenSink($this->page);
		}

	public function testBlockGrid() : void
		{
		$blockGrid = new \PHPFUI\BlockGrid();
		$this->assertValidHtml($blockGrid);
		}

	public function testCancel() : void
		{
		$this->assertValidHtml(new \PHPFUI\Cancel('Cancel Me!'));
		}

	public function testCell() : void
		{
		$cell = new \PHPFUI\Cell();
		$this->assertValidHtml($cell);
		}

	public function testFieldSet() : void
		{
		$fieldSet = new \PHPFUI\FieldSet();
		$this->assertValidHtml($fieldSet);
		}

	public function testForm() : void
		{
		$form = new \PHPFUI\Form($this->page);
		$this->assertValidHtml($form);
		}

	public function testFormError() : void
		{
		$formError = new \PHPFUI\FormError();
		$this->assertValidHtml($formError);
		}

	public function testGridContainer() : void
		{
		$gridContainer = new \PHPFUI\GridContainer();
		$this->assertValidHtml($gridContainer);
		}

	public function testGridX() : void
		{
		$gridX = new \PHPFUI\GridX();
		$this->assertValidHtml($gridX);
		}

	public function testGridY() : void
		{
		$gridY = new \PHPFUI\GridY('100em');
		$this->assertValidHtml($gridY);
		}

	public function testHeader() : void
		{
		$header = new \PHPFUI\Header('Header');
		$this->assertValidHtml($header);
		}

	public function testHTML5Element() : void
		{
		$hTML5Element = new \PHPFUI\HTML5Element('div');
		$hTML5Element->add('Some text');
		$this->assertValidHtml($hTML5Element);
		}

	public function testIcon() : void
		{
		$icon = new \PHPFUI\Icon('edit');
		$icon->setTooltip('This is a tooltip');

		$this->assertValidHtml($icon);
		}

	public function testImage() : void
		{
		$image = new \PHPFUI\Image('https://raw.githubusercontent.com/phpfui/phpfui/master/examples/PHPFUI.PNG');
		$this->assertValidHtml($image);

		$imageFile = new \PHPFUI\Image('');
		$imageFile->base64EncodeFile('https://raw.githubusercontent.com/phpfui/phpfui/master/examples/PHPFUI.PNG');
		$this->assertValidHtml($imageFile);
		}

	public function testInput() : void
		{
		$input = new \PHPFUI\Input('text', 'fred', 'Fred');
		$this->assertValidHtml($input);
		}

	public function testKitchenSink() : void
		{
		$this->assertValidHtml($this->ks->render());
		}

	public function testKitchenSinkExamples() : void
		{
		$examples = $this->ks->getExamples();

		foreach ($examples as $name => $example)
			{
			$this->assertValidHtml($this->ks->{$example}(), $name);
			}
		}

	public function testKitchenSinkExtra() : void
		{
		$this->assertValidHtml($this->ks->render('extra'));
		}

	public function testKitchenSinkInput() : void
		{
		$this->assertValidHtml($this->ks->render('input'));
		}

	public function testLabel() : void
		{
		$label = new \PHPFUI\Label('Label');
		$this->assertValidHtml($label);
		}

	public function testLink() : void
		{
		$link = new \PHPFUI\Link('http://www.ibm.com', 'IBM');
		$this->assertValidHtml($link);
		$this->assertValidHtml(\PHPFUI\Link::email('test@example.com', 'Test Example', 'What\'s up?'));
		$this->assertValidHtml(\PHPFUI\Link::phone('867-5309', 'Jenny'));
		}

	public function testMediaObject() : void
		{
		$mediaObject = new \PHPFUI\MediaObject();
		$this->assertValidHtml($mediaObject);
		}

	public function testMultiColumn() : void
		{
		$multiColumn = new \PHPFUI\MultiColumn(new \PHPFUI\Link('http://www.ibm.com', 'IBM'), new \PHPFUI\Button('Go'));
		$this->assertValidHtml($multiColumn);
		}

	public function testPage() : void
		{
		$this->assertValidHtml($this->page);
		}

	public function testPanel() : void
		{
		$panel = new \PHPFUI\Panel('Panel');
		$this->assertValidHtml($panel);
		}

	public function testPayPalExpress() : void
		{
		$payPalExpress = new \PHPFUI\PayPalExpress($this->page, 'ClientId');
		$this->assertValidHtml($payPalExpress);
		}

	public function testReCAPTCHA() : void
		{
		$reCAPTCHA = new \PHPFUI\ReCAPTCHA($this->page, 'public', 'private');
		$this->assertValidHtml($reCAPTCHA);
		}

	public function testReset() : void
		{
		$reset = new \PHPFUI\Reset();
		$this->assertValidHtml($reset);
		}

	public function testReveal() : void
		{
		$button = new \PHPFUI\Button('Reveal Me!');
		$reveal = new \PHPFUI\Reveal($this->page, $button);
		$close = $reveal->getCloseButton();
		$reveal->showOnPageLoad();
		$reveal->loadUrlOnOpen('https://raw.githubusercontent.com/phpfui/phpfui/master/examples/PHPFUI.PNG');

		$container = new \PHPFUI\Container();
		$container->add($button);
		$container->add($reveal);

		$this->assertValidHtml($container);
		}

	public function testSticky() : void
		{
		$sticky = new \PHPFUI\Sticky(new \PHPFUI\Callout());
		$this->assertValidHtml($sticky);
		}
	}
