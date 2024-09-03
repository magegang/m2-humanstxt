<?php
/**
 * Copyright © Magegang All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Magegang\HumansTxt\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    /**
     * Add credits at the end of humans.txt.
     * Feel free to remove them if you deem it necessary using a Plugin.
     */
    public function getCredits(): string
    {
        return "\n\r/* THANKS */\n\rName: https://www.magegang.com";
    }
}
