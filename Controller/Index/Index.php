<?php
/**
 * Copyright © Magegang All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Magegang\HumansTxt\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class Index implements HttpGetActionInterface
{
    public function __construct(
        private readonly PageFactory $resultPageFactory
    ) {
    }

    public function execute(): Page
    {
        $resultPage = $this->resultPageFactory->create(true);
        $resultPage->addHandle('humanstxt_index_index');
        $resultPage->setHeader('Content-Type', 'text/plain');
        return $resultPage;
    }
}
