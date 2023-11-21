<?php
/**
 * Copyright © Magegang All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magegang\Humans\Block;

use Magegang\Humans\Helper\Data;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\AbstractBlock;
use Magento\Framework\View\Element\Context;

class Humans extends AbstractBlock
{
    /**
     * @param \Magegang\Humans\Helper\Data $helper
     * @param \Magento\Framework\View\Element\Context $context
     * @param array $data
     */
    public function __construct(
        protected Data $helper,
        Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    protected function _toHtml(): string
    {
        return $this->_scopeConfig->getValue(
            'humans/general/text',
            ScopeConfigInterface::SCOPE_TYPE_DEFAULT
        ) . PHP_EOL . $this->helper->getCredits();
    }
}
