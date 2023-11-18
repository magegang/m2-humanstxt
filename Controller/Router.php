<?php
/**
 * Copyright © Magegang All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magegang\Humans\Controller;

use Magegang\Humans\Enum\Humans;
use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Route\Config;
use Magento\Framework\App\Router\ActionList;
use Magento\Framework\App\RouterInterface;

class Router implements RouterInterface
{
    /**
     * @param \Magento\Framework\App\Router\ActionList $actionList
     * @param \Magento\Framework\App\ActionFactory $actionFactory
     * @param \Magento\Framework\App\Route\Config $routeConfig
     */
    public function __construct(
        protected ActionList $actionList,
        protected ActionFactory $actionFactory,
        protected Config $routeConfig
    ) {
    }

    /**
     * @param \Magento\Framework\App\RequestInterface $request
     * @return \Magento\Framework\App\ActionInterface|null
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
