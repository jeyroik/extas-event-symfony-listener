<?php
namespace extas\components\events;

use extas\components\SystemContainer;
use extas\interfaces\plugins\IPlugin;
use extas\interfaces\plugins\IPluginRepository;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class SymfonyEventContainer
 *
 * @package extas\components\events
 * @author jeyroik <jeyroik@gmail.com>
 */
class SymfonyEventContainer
{
    /**
     * @param EventDispatcherInterface $dispatcher
     */
    public static function loadStages(EventDispatcherInterface &$dispatcher)
    {
        /**
         * @var $pluginRepo IPluginRepository
         * @var $plugins IPlugin[]
         */
        $pluginRepo = SystemContainer::getItem(IPluginRepository::class);
        $plugins = $pluginRepo->all([]);
        foreach ($plugins as $plugin) {
            $dispatcher->addListener($plugin->getStage(), $plugin->buildClassWithParameters());
        }
    }
}