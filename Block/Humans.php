<?php
/**
 * Copyright © Magegang All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magegang\Humans\Block;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\AbstractBlock;

class Humans extends AbstractBlock
{
    /**
     * @return string
     */
    protected function _toHtml(): string
    {
        return $this->_scopeConfig->getValue(
            'humans/general/text',
            ScopeConfigInterface::SCOPE_TYPE_DEFAULT
        ) . PHP_EOL . $this->addCredits();
    }

    /**
     * @return string
     */
    private function addCredits(): string
    {
        return "/* THANKS */\n\rName: https://www.magegang.com";
    }
}
