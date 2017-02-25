<?php

namespace Phalcon\Test\Unit\Mvc;

use Phalcon\Di;
use Phalcon\Mvc\Model\Manager;
use Phalcon\Mvc\Model\MetaData\Memory;

/**
 * \Phalcon\Test\Unit\Mvc\ModelTrait
 * Helper class to test Phalcon\Mvc\Model component
 *
 * @copyright (c) 2011-2017 Phalcon Team
 * @link      https://phalconphp.com
 * @author    Andres Gutierrez <andres@phalconphp.com>
 * @author    Serghei Iakovlev <serghei@phalconphp.com>
 * @author    Wojciech Ślawski <jurigag@gmail.com>
 * @package   Phalcon\Test\Unit\Mvc
 *
 * The contents of this file are subject to the New BSD License that is
 * bundled with this package in the file docs/LICENSE.txt
 *
 * If you did not receive a copy of the license and are unable to obtain it
 * through the world-wide-web, please send an email to license@phalconphp.com
 * so that we can send you a copy immediately.
 */
trait ModelTrait
{
    protected function setUpModelsManager()
    {
        $di = Di::getDefault();
        $db = $di->getShared('db');

        Di::reset();

        $di = new Di();

        $manager = new Manager();
        $manager->setDI($di);

        $di->setShared('db', $db);
        $di->setShared('modelsManager', $manager);
        $di->setShared('modelsMetadata', Memory::class);

        Di::setDefault($di);

        return $manager;
    }
}
