<?php
/**
 * Copyright © Magegang All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Magegang\HumansTxt\Plugin\Framework\View\Page\Config;

use Magegang\HumansTxt\Enum\Humans;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Page\Config\Renderer as ConfigRenderer;

class Renderer
{
    public function __construct(
        private readonly UrlInterface $urlBuilder
    ) {
    }

    public function afterRenderMetadata(ConfigRenderer $subject, $result): string
    {
        $humansTxtUrl = $this->urlBuilder->getUrl(Humans::TARGET->value);
        $result .= '<link type="text/plain" rel="author" href="' . $humansTxtUrl . '" />' . PHP_EOL;
        return $result;
    }
}
