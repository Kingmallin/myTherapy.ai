<?php

namespace DoctrineProxies\__CG__\App\Models\User;


/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class UserAddress extends \App\Models\User\UserAddress implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'App\\Models\\User\\UserAddress' . "\0" . 'id', '' . "\0" . 'App\\Models\\User\\UserAddress' . "\0" . 'user', '' . "\0" . 'App\\Models\\User\\UserAddress' . "\0" . 'county', '' . "\0" . 'App\\Models\\User\\UserAddress' . "\0" . 'postcode', '' . "\0" . 'App\\Models\\User\\UserAddress' . "\0" . 'addressLine1', '' . "\0" . 'App\\Models\\User\\UserAddress' . "\0" . 'addressLine2', '' . "\0" . 'App\\Models\\User\\UserAddress' . "\0" . 'addressLine3', '' . "\0" . 'App\\Models\\User\\UserAddress' . "\0" . 'addressLine4', '' . "\0" . 'App\\Models\\User\\UserAddress' . "\0" . 'region', '' . "\0" . 'App\\Models\\User\\UserAddress' . "\0" . 'createdAt'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Models\\User\\UserAddress' . "\0" . 'id', '' . "\0" . 'App\\Models\\User\\UserAddress' . "\0" . 'user', '' . "\0" . 'App\\Models\\User\\UserAddress' . "\0" . 'county', '' . "\0" . 'App\\Models\\User\\UserAddress' . "\0" . 'postcode', '' . "\0" . 'App\\Models\\User\\UserAddress' . "\0" . 'addressLine1', '' . "\0" . 'App\\Models\\User\\UserAddress' . "\0" . 'addressLine2', '' . "\0" . 'App\\Models\\User\\UserAddress' . "\0" . 'addressLine3', '' . "\0" . 'App\\Models\\User\\UserAddress' . "\0" . 'addressLine4', '' . "\0" . 'App\\Models\\User\\UserAddress' . "\0" . 'region', '' . "\0" . 'App\\Models\\User\\UserAddress' . "\0" . 'createdAt'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (UserAddress $proxy) {
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
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getUser(): \App\Models\User\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUser', []);

        return parent::getUser();
    }

    /**
     * {@inheritDoc}
     */
    public function setUser(\App\Models\User\User $user): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUser', [$user]);

        parent::setUser($user);
    }

    /**
     * {@inheritDoc}
     */
    public function getCounty(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCounty', []);

        return parent::getCounty();
    }

    /**
     * {@inheritDoc}
     */
    public function setCounty(string $county): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCounty', [$county]);

        parent::setCounty($county);
    }

    /**
     * {@inheritDoc}
     */
    public function getPostcode(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPostcode', []);

        return parent::getPostcode();
    }

    /**
     * {@inheritDoc}
     */
    public function setPostcode(string $postcode): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPostcode', [$postcode]);

        parent::setPostcode($postcode);
    }

    /**
     * {@inheritDoc}
     */
    public function getAddressLine1(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAddressLine1', []);

        return parent::getAddressLine1();
    }

    /**
     * {@inheritDoc}
     */
    public function setAddressLine1(string $addressLine1): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAddressLine1', [$addressLine1]);

        parent::setAddressLine1($addressLine1);
    }

    /**
     * {@inheritDoc}
     */
    public function getAddressLine2(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAddressLine2', []);

        return parent::getAddressLine2();
    }

    /**
     * {@inheritDoc}
     */
    public function setAddressLine2(?string $addressLine2): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAddressLine2', [$addressLine2]);

        parent::setAddressLine2($addressLine2);
    }

    /**
     * {@inheritDoc}
     */
    public function getAddressLine3(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAddressLine3', []);

        return parent::getAddressLine3();
    }

    /**
     * {@inheritDoc}
     */
    public function setAddressLine3(?string $addressLine3): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAddressLine3', [$addressLine3]);

        parent::setAddressLine3($addressLine3);
    }

    /**
     * {@inheritDoc}
     */
    public function getAddressLine4(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAddressLine4', []);

        return parent::getAddressLine4();
    }

    /**
     * {@inheritDoc}
     */
    public function setAddressLine4(?string $addressLine4): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAddressLine4', [$addressLine4]);

        parent::setAddressLine4($addressLine4);
    }

    /**
     * {@inheritDoc}
     */
    public function getRegion(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRegion', []);

        return parent::getRegion();
    }

    /**
     * {@inheritDoc}
     */
    public function setRegion(string $region): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRegion', [$region]);

        parent::setRegion($region);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedAt(): \DateTimeImmutable
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedAt', []);

        return parent::getCreatedAt();
    }

}
