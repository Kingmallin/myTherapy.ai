<?php

namespace DoctrineProxies\__CG__\App\Entities;


/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Job extends \App\Entities\Job implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array<string, null> properties to be lazy loaded, indexed by property name
     */
    public static $lazyPropertiesNames = array (
);

    /**
     * @var array<string, mixed> default values of properties to be lazy loaded, with keys being the property names
     *
     * @see \Doctrine\Common\Proxy\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array (
);



    public function __construct(?\Closure $initializer = null, ?\Closure $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'App\\Entities\\Job' . "\0" . 'id', '' . "\0" . 'App\\Entities\\Job' . "\0" . 'queue', '' . "\0" . 'App\\Entities\\Job' . "\0" . 'payload', '' . "\0" . 'App\\Entities\\Job' . "\0" . 'attempts', '' . "\0" . 'App\\Entities\\Job' . "\0" . 'reserved', '' . "\0" . 'App\\Entities\\Job' . "\0" . 'reserved_at', '' . "\0" . 'App\\Entities\\Job' . "\0" . 'available_at', '' . "\0" . 'App\\Entities\\Job' . "\0" . 'created_at'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entities\\Job' . "\0" . 'id', '' . "\0" . 'App\\Entities\\Job' . "\0" . 'queue', '' . "\0" . 'App\\Entities\\Job' . "\0" . 'payload', '' . "\0" . 'App\\Entities\\Job' . "\0" . 'attempts', '' . "\0" . 'App\\Entities\\Job' . "\0" . 'reserved', '' . "\0" . 'App\\Entities\\Job' . "\0" . 'reserved_at', '' . "\0" . 'App\\Entities\\Job' . "\0" . 'available_at', '' . "\0" . 'App\\Entities\\Job' . "\0" . 'created_at'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Job $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy::$lazyPropertiesDefaults as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load(): void
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized(): bool
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized): void
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(?\Closure $initializer = null): void
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer(): ?\Closure
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(?\Closure $cloner = null): void
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner(): ?\Closure
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @deprecated no longer in use - generated code now relies on internal components rather than generated public API
     * @static
     */
    public function __getLazyProperties(): array
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId(): int
    {
        if ($this->__isInitialized__ === false) {
            return  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getQueue(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getQueue', []);

        return parent::getQueue();
    }

    /**
     * {@inheritDoc}
     */
    public function setQueue(string $queue): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setQueue', [$queue]);

        parent::setQueue($queue);
    }

    /**
     * {@inheritDoc}
     */
    public function getPayload(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPayload', []);

        return parent::getPayload();
    }

    /**
     * {@inheritDoc}
     */
    public function setPayload(string $payload): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPayload', [$payload]);

        parent::setPayload($payload);
    }

    /**
     * {@inheritDoc}
     */
    public function getAttempts(): int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAttempts', []);

        return parent::getAttempts();
    }

    /**
     * {@inheritDoc}
     */
    public function setAttempts(int $attempts): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAttempts', [$attempts]);

        parent::setAttempts($attempts);
    }

    /**
     * {@inheritDoc}
     */
    public function getReserved(): int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getReserved', []);

        return parent::getReserved();
    }

    /**
     * {@inheritDoc}
     */
    public function setReserved(int $reserved): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setReserved', [$reserved]);

        parent::setReserved($reserved);
    }

    /**
     * {@inheritDoc}
     */
    public function getReservedAt(): ?\DateTime
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getReservedAt', []);

        return parent::getReservedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setReservedAt(?\DateTime $reservedAt): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setReservedAt', [$reservedAt]);

        parent::setReservedAt($reservedAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getAvailableAt(): ?\DateTime
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAvailableAt', []);

        return parent::getAvailableAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setAvailableAt(?\DateTime $availableAt): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAvailableAt', [$availableAt]);

        parent::setAvailableAt($availableAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedAt(): ?\DateTime
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedAt', []);

        return parent::getCreatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedAt(?\DateTime $createdAt): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedAt', [$createdAt]);

        parent::setCreatedAt($createdAt);
    }

}
