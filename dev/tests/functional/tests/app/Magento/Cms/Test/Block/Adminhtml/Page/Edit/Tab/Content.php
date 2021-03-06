<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Cms\Test\Block\Adminhtml\Page\Edit\Tab;

use Magento\Mtf\Client\Locator;
use Magento\Backend\Test\Block\Widget\Tab;
use Magento\Mtf\Client\Element\SimpleElement;
use Magento\Widget\Test\Block\Adminhtml\WidgetForm;
use Magento\Cms\Test\Block\Adminhtml\Wysiwyg\Config;

/**
 * Backend cms page content tab.
 */
class Content extends Tab
{
    /**
     * System Variable block selector.
     *
     * @var string
     */
    protected $systemVariableBlock = "./ancestor::body//div[div[@id='variables-chooser']]";

    /**
     * Widget block selector.
     *
     * @var string
     */
    protected $widgetBlock = "//body//aside[div//*[@id='widget_options_form']]";

    /**
     * Insert Variable button selector.
     *
     * @var string
     */
    protected $addVariableButton = ".add-variable";

    /**
     * Insert Widget button selector.
     *
     * @var string
     */
    protected $addWidgetButton = '.action-add-widget';

    /**
     * Content input locator.
     *
     * @var string
     */
    protected $content = '#page_content';

    /**
     * Content Heading input locator.
     *
     * @var string
     */
    protected $contentHeading = '#page_content_heading';

    /**
     * Clicking in content tab 'Insert Variable' button.
     *
     * @param SimpleElement $element [optional]
     * @return void
     */
    public function clickInsertVariable(SimpleElement $element = null)
    {
        $context = $element === null ? $this->_rootElement : $element;
        $addVariableButton = $context->find($this->addVariableButton);
        if ($addVariableButton->isVisible()) {
            $addVariableButton->click();
        }
    }

    /**
     * Clicking in content tab 'Insert Widget' button.
     *
     * @param SimpleElement $element [optional]
     * @return void
     */
    public function clickInsertWidget(SimpleElement $element = null)
    {
        $context = $element === null ? $this->_rootElement : $element;
        $addWidgetButton = $context->find($this->addWidgetButton);
        if ($addWidgetButton->isVisible()) {
            $addWidgetButton->click();
        }
    }

    /**
     * Get for wysiwyg config block.
     *
     * @return Config
     */
    public function getWysiwygConfig()
    {
        return $this->blockFactory->create(
            'Magento\Cms\Test\Block\Adminhtml\Wysiwyg\Config',
            ['element' => $this->_rootElement->find($this->systemVariableBlock, Locator::SELECTOR_XPATH)]
        );
    }

    /**
     * Get widget block.
     *
     * @return WidgetForm
     */
    public function getWidgetBlock()
    {
        return $this->blockFactory->create(
            'Magento\Widget\Test\Block\Adminhtml\WidgetForm',
            ['element' => $this->_rootElement->find($this->widgetBlock, Locator::SELECTOR_XPATH)]
        );
    }
}
