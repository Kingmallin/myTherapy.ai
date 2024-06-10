<?php

namespace DoctrineProxies\__CG__\App\Models\ChatRoom;


/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class ChatRoom extends \App\Models\ChatRoom\ChatRoom implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'App\\Models\\ChatRoom\\ChatRoom' . "\0" . 'id', '' . "\0" . 'App\\Models\\ChatRoom\\ChatRoom' . "\0" . 'mentalHealth', '' . "\0" . 'App\\Models\\ChatRoom\\ChatRoom' . "\0" . 'name', '' . "\0" . 'App\\Models\\ChatRoom\\ChatRoom' . "\0" . 'description', '' . "\0" . 'App\\Models\\ChatRoom\\ChatRoom' . "\0" . 'backgroundColor', '' . "\0" . 'App\\Models\\ChatRoom\\ChatRoom' . "\0" . 'userLimit'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Models\\ChatRoom\\ChatRoom' . "\0" . 'id', '' . "\0" . 'App\\Models\\ChatRoom\\ChatRoom' . "\0" . 'mentalHealth', '' . "\0" . 'App\\Models\\ChatRoom\\ChatRoom' . "\0" . 'name', '' . "\0" . 'App\\Models\\ChatRoom\\ChatRoom' . "\0" . 'description', '' . "\0" . 'App\\Models\\ChatRoom\\ChatRoom' . "\0" . 'backgroundColor', '' . "\0" . 'App\\Models\\ChatRoom\\ChatRoom' . "\0" . 'userLimit'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (ChatRoom $proxy) {
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
    public function getId(): ?int
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getMentalHealth(): ?\App\Models\MentalHealth\MentalHealth
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMentalHealth', []);

        return parent::getMentalHealth();
    }

    /**
     * {@inheritDoc}
     */
    public function setMentalHealth(\App\Models\MentalHealth\MentalHealth $mentalHealth): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMentalHealth', [$mentalHealth]);

        parent::setMentalHealth($mentalHealth);
    }

    /**
     * {@inheritDoc}
     */
    public function getName(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getName', []);

        return parent::getName();
    }

    /**
     * {@inheritDoc}
     */
    public function setName(string $name): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setName', [$name]);

        parent::setName($name);
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDescription', []);

        return parent::getDescription();
    }

    /**
     * {@inheritDoc}
     */
    public function setDescription(?string $description): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDescription', [$description]);

        parent::setDescription($description);
    }

    /**
     * {@inheritDoc}
     */
    public function getBackgroundColor(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBackgroundColor', []);

        return parent::getBackgroundColor();
    }

    /**
     * {@inheritDoc}
     */
    public function setBackgroundColor(string $backgroundColor): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBackgroundColor', [$backgroundColor]);

        parent::setBackgroundColor($backgroundColor);
    }

    /**
     * {@inheritDoc}
     */
    public function getUserLimit(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUserLimit', []);

        return parent::getUserLimit();
    }

    /**
     * {@inheritDoc}
     */
    public function setUserLimit(int $userLimit): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUserLimit', [$userLimit]);

        parent::setUserLimit($userLimit);
    }

}
