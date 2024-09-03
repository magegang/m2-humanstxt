<?php
/**
 * Copyright © Magegang All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Magegang\HumansTxt\Block;

use Magegang\HumansTxt\Helper\Data;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\AbstractBlock;
use Magento\Framework\View\Element\Context;

class Humans extends AbstractBlock
{
    public function __construct(
        private readonly Data $helper,
        Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    protected function _toHtml(): string
    {
        return $this->_scopeConfig->getValue(
            'humanstxt/general/text',
            ScopeConfigInterface::SCOPE_TYPE_DEFAULT
        ) . PHP_EOL . $this->helper->getCredits();
    }
}
