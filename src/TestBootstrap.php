<?php

namespace Fooman\Magento2DevBootstrap;

use Magento\Framework\Autoload\AutoloaderRegistry;
use Magento\Framework\Autoload\ClassLoaderWrapper;
use Magento\Framework\App\Bootstrap;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\App\State;

class TestBootstrap
{

    public function run($magentoPath = '')
    {
        $this->setupPaths($magentoPath);
        $this->setupAutoloader();
        $this->createApp();
    }

    private function setupAutoloader()
    {
        $vendorAutoload = dirname(dirname(dirname(dirname(__DIR__)))) . "/vendor/autoload.php";
        $composerAutoloader = include $vendorAutoload;

        AutoloaderRegistry::registerAutoloader(new ClassLoaderWrapper($composerAutoloader));
    }

    private function createApp()
    {
        $params = $_SERVER;

        $params[Bootstrap::INIT_PARAM_FILESYSTEM_DIR_PATHS] = [
            DirectoryList::CONFIG => [
                DirectoryList::PATH => __DIR__ . '/etc'
            ]
        ];
        $params[Bootstrap::PARAM_REQUIRE_MAINTENANCE] = false; // default false
        $params[Bootstrap::PARAM_REQUIRE_IS_INSTALLED] = false; // default true
        $params[State::PARAM_MODE] = State::MODE_DEVELOPER;
        $bootstrap = Bootstrap::create(BP, $params);
        /** @var \Magento\Framework\App\Http $app */
        $bootstrap->createApplication(\Magento\Framework\App\Http::class);
    }

    /**
     * @param $magentoPath
     *
     * @throws \Exception
     */
    private function setupPaths($magentoPath)
    {
        if (defined('BP')) {
            throw new \Exception('BP is already defined');
        }
        define('BP', $magentoPath);

        if (!file_exists($magentoPath)) {
            mkdir($magentoPath, 0775, true);
        }
    }
}