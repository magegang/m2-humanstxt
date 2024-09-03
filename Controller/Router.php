<?php
/**
 * Copyright © Magegang All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Magegang\HumansTxt\Controller;

use Magegang\HumansTxt\Enum\Humans;
use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Route\Config;
use Magento\Framework\App\Router\ActionList;
use Magento\Framework\App\RouterInterface;

class Router implements RouterInterface
{
    public function __construct(
        private readonly ActionList $actionList,
        private readonly ActionFactory $actionFactory,
        private readonly Config $routeConfig
    ) {
    }

    /**
     * @throws \ReflectionException
     */
    public function match(RequestInterface $request): ?ActionInterface
    {
        $identifier = trim($request->getPathInfo(), '/');
        if ($identifier !== Humans::TARGET->value) {
            return null;
        }

        $modules = $this->routeConfig->getModulesByFrontName(Humans::NAME->value);
        if (empty($modules)) {
            return null;
        }

        $actionClassName = $this->actionList->get($modules[0], null, 'index', 'index');

        return $this->actionFactory->create($actionClassName);
    }
}
