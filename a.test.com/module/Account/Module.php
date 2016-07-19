<?php
/**
 * 1.告诉 MoudleManger 我的模块配置是什么
 * 2.注册一些服务
 * 3.告诉 MoudleManager 我怎么去自动加载我的 MOudle 里面的文件
 *
 *
 */
namespace Account;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;

// Add these import statements:
use Account\Model\Account;
use Account\Model\AccountTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module implements ConfigProviderInterface, AutoloaderProviderInterface
{
    
    // public function onBootstrap(MvcEvent $e)
    // {
    // $eventManager = $e->getApplication()->getEventManager();
    // $moduleRouteListener = new ModuleRouteListener();
    // $moduleRouteListener->attach($eventManager);
    // }
    
    /*
     * 模块是怎么自动加载的
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php'
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                )
            )
        );
    }

    /**
     * 模块的配置文件
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    // Add this method:
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Account\Model\AccountTable' => function ($sm) {
                    $tableGateway = $sm->get('AccountTableGateway');
                    $table = new AccountTable($tableGateway);
                    return $table;
                },
                'AccountTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Account());
                    return new TableGateway('account', $dbAdapter, null, $resultSetPrototype);
                }
            )
        );
    }
}