<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;

/**
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 *
 * @final since Symfony 3.3
 */
class Symfony_DI_PhpDumper_Test_Almost_Circular_Public extends Container
{
    private $parameters;
    private $targetDirs = array();

    public function __construct()
    {
        $this->services = array();
        $this->methodMap = array(
            'bar' => 'getBarService',
            'bar3' => 'getBar3Service',
            'bar5' => 'getBar5Service',
            'connection' => 'getConnectionService',
            'connection2' => 'getConnection2Service',
            'dispatcher' => 'getDispatcherService',
            'dispatcher2' => 'getDispatcher2Service',
            'foo' => 'getFooService',
            'foo2' => 'getFoo2Service',
            'foo4' => 'getFoo4Service',
            'foo5' => 'getFoo5Service',
            'foobar' => 'getFoobarService',
            'foobar2' => 'getFoobar2Service',
            'foobar3' => 'getFoobar3Service',
            'foobar4' => 'getFoobar4Service',
            'logger' => 'getLoggerService',
            'manager' => 'getManagerService',
            'manager2' => 'getManager2Service',
            'subscriber' => 'getSubscriberService',
        );

        $this->aliases = array();
    }

    public function getRemovedIds()
    {
        return array(
            'Psr\\Container\\ContainerInterface' => true,
            'Symfony\\Component\\DependencyInjection\\ContainerInterface' => true,
            'bar2' => true,
            'config' => true,
            'config2' => true,
            'logger2' => true,
            'subscriber2' => true,
        );
    }

    public function compile()
    {
        throw new LogicException('You cannot compile a dumped container that was already compiled.');
    }

    public function isCompiled()
    {
        return true;
    }

    public function isFrozen()
    {
        @trigger_error(sprintf('The %s() method is deprecated since Symfony 3.3 and will be removed in 4.0. Use the isCompiled() method instead.', __METHOD__), E_USER_DEPRECATED);

        return true;
    }

    /**
     * Gets the public 'bar' shared service.
     *
     * @return \BarCircular
     */
    protected function getBarService()
    {
        $this->services['bar'] = $instance = new \BarCircular();

        $instance->addFoobar(${($_ = isset($this->services['foobar']) ? $this->services['foobar'] : $this->getFoobarService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the public 'bar3' shared service.
     *
     * @return \BarCircular
     */
    protected function getBar3Service()
    {
        $this->services['bar3'] = $instance = new \BarCircular();

        $a = ${($_ = isset($this->services['foobar3']) ? $this->services['foobar3'] : $this->services['foobar3'] = new \FoobarCircular()) && false ?: '_'};

        $instance->addFoobar($a, $a);

        return $instance;
    }

    /**
     * Gets the public 'bar5' shared service.
     *
     * @return \stdClass
     */
    protected function getBar5Service()
    {
        $a = ${($_ = isset($this->services['foo5']) ? $this->services['foo5'] : $this->getFoo5Service()) && false ?: '_'};

        if (isset($this->services['bar5'])) {
            return $this->services['bar5'];
        }

        $this->services['bar5'] = $instance = new \stdClass($a);

        $instance->foo = $a;

        return $instance;
    }

    /**
     * Gets the public 'connection' shared service.
     *
     * @return \stdClass
     */
    protected function getConnectionService()
    {
        $a = ${($_ = isset($this->services['dispatcher']) ? $this->services['dispatcher'] : $this->getDispatcherService()) && false ?: '_'};

        if (isset($this->services['connection'])) {
            return $this->services['connection'];
        }

        $b = new \stdClass();

        $this->services['connection'] = $instance = new \stdClass($a, $b);

        $b->logger = ${($_ = isset($this->services['logger']) ? $this->services['logger'] : $this->getLoggerService()) && false ?: '_'};

        return $instance;
    }

    /**
     * Gets the public 'connection2' shared service.
     *
     * @return \stdClass
     */
    protected function getConnection2Service()
    {
        $a = ${($_ = isset($this->services['dispatcher2']) ? $this->services['dispatcher2'] : $this->getDispatcher2Service()) && false ?: '_'};

        if (isset($this->services['connection2'])) {
            return $this->services['connection2'];
        }

        $b = new \stdClass();

        $this->services['connection2'] = $instance = new \stdClass($a, $b);

        $c = new \stdClass($instance);

        $c->handler2 = new \stdClass(${($_ = isset($this->services['manager2']) ? $this->services['manager2'] : $this->getManager2Service()) && false ?: '_'});
        $b->logger2 = $c;

        return $instance;
    }

    /**
     * Gets the public 'dispatcher' shared service.
     *
     * @return \stdClass
     */
    protected function getDispatcherService($lazyLoad = true)
    {
        $this->services['dispatcher'] = $instance = new \stdClass();

        $instance->subscriber = ${($_ = isset($this->services['subscriber']) ? $this->services['subscriber'] : $this->getSubscriberService()) && false ?: '_'};

        return $instance;
    }

    /**
     * Gets the public 'dispatcher2' shared service.
     *
     * @return \stdClass
     */
    protected function getDispatcher2Service($lazyLoad = true)
    {
        $this->services['dispatcher2'] = $instance = new \stdClass();

        $instance->subscriber2 = new \stdClass(${($_ = isset($this->services['manager2']) ? $this->services['manager2'] : $this->getManager2Service()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the public 'foo' shared service.
     *
     * @return \FooCircular
     */
    protected function getFooService()
    {
        $a = ${($_ = isset($this->services['bar']) ? $this->services['bar'] : $this->getBarService()) && false ?: '_'};

        if (isset($this->services['foo'])) {
            return $this->services['foo'];
        }

        return $this->services['foo'] = new \FooCircular($a);
    }

    /**
     * Gets the public 'foo2' shared service.
     *
     * @return \FooCircular
     */
    protected function getFoo2Service()
    {
        $a = new \BarCircular();

        $this->services['foo2'] = $instance = new \FooCircular($a);

        $a->addFoobar(${($_ = isset($this->services['foobar2']) ? $this->services['foobar2'] : $this->getFoobar2Service()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the public 'foo4' service.
     *
     * @return \stdClass
     */
    protected function getFoo4Service()
    {
        $instance = new \stdClass();

        $instance->foobar = ${($_ = isset($this->services['foobar4']) ? $this->services['foobar4'] : $this->getFoobar4Service()) && false ?: '_'};

        return $instance;
    }

    /**
     * Gets the public 'foo5' shared service.
     *
     * @return \stdClass
     */
    protected function getFoo5Service()
    {
        $this->services['foo5'] = $instance = new \stdClass();

        $instance->bar = ${($_ = isset($this->services['bar5']) ? $this->services['bar5'] : $this->getBar5Service()) && false ?: '_'};

        return $instance;
    }

    /**
     * Gets the public 'foobar' shared service.
     *
     * @return \FoobarCircular
     */
    protected function getFoobarService()
    {
        $a = ${($_ = isset($this->services['foo']) ? $this->services['foo'] : $this->getFooService()) && false ?: '_'};

        if (isset($this->services['foobar'])) {
            return $this->services['foobar'];
        }

        return $this->services['foobar'] = new \FoobarCircular($a);
    }

    /**
     * Gets the public 'foobar2' shared service.
     *
     * @return \FoobarCircular
     */
    protected function getFoobar2Service()
    {
        $a = ${($_ = isset($this->services['foo2']) ? $this->services['foo2'] : $this->getFoo2Service()) && false ?: '_'};

        if (isset($this->services['foobar2'])) {
            return $this->services['foobar2'];
        }

        return $this->services['foobar2'] = new \FoobarCircular($a);
    }

    /**
     * Gets the public 'foobar3' shared service.
     *
     * @return \FoobarCircular
     */
    protected function getFoobar3Service()
    {
        return $this->services['foobar3'] = new \FoobarCircular();
    }

    /**
     * Gets the public 'foobar4' shared service.
     *
     * @return \stdClass
     */
    protected function getFoobar4Service()
    {
        $a = new \stdClass();

        $this->services['foobar4'] = $instance = new \stdClass($a);

        $a->foobar = $instance;

        return $instance;
    }

    /**
     * Gets the public 'logger' shared service.
     *
     * @return \stdClass
     */
    protected function getLoggerService()
    {
        $a = ${($_ = isset($this->services['connection']) ? $this->services['connection'] : $this->getConnectionService()) && false ?: '_'};

        if (isset($this->services['logger'])) {
            return $this->services['logger'];
        }

        $this->services['logger'] = $instance = new \stdClass($a);

        $instance->handler = new \stdClass(${($_ = isset($this->services['manager']) ? $this->services['manager'] : $this->getManagerService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the public 'manager' shared service.
     *
     * @return \stdClass
     */
    protected function getManagerService()
    {
        $a = ${($_ = isset($this->services['connection']) ? $this->services['connection'] : $this->getConnectionService()) && false ?: '_'};

        if (isset($this->services['manager'])) {
            return $this->services['manager'];
        }

        return $this->services['manager'] = new \stdClass($a);
    }

    /**
     * Gets the public 'manager2' shared service.
     *
     * @return \stdClass
     */
    protected function getManager2Service()
    {
        $a = ${($_ = isset($this->services['connection2']) ? $this->services['connection2'] : $this->getConnection2Service()) && false ?: '_'};

        if (isset($this->services['manager2'])) {
            return $this->services['manager2'];
        }

        return $this->services['manager2'] = new \stdClass($a);
    }

    /**
     * Gets the public 'subscriber' shared service.
     *
     * @return \stdClass
     */
    protected function getSubscriberService()
    {
        $a = ${($_ = isset($this->services['manager']) ? $this->services['manager'] : $this->getManagerService()) && false ?: '_'};

        if (isset($this->services['subscriber'])) {
            return $this->services['subscriber'];
        }

        return $this->services['subscriber'] = new \stdClass($a);
    }
}
