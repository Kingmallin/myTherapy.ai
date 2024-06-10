<?php

namespace DoctrineProxies\__CG__\App\Models\EmergencyHelp;


/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class EmergencyHelp extends \App\Models\EmergencyHelp\EmergencyHelp implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'App\\Models\\EmergencyHelp\\EmergencyHelp' . "\0" . 'id', '' . "\0" . 'App\\Models\\EmergencyHelp\\EmergencyHelp' . "\0" . 'name', '' . "\0" . 'App\\Models\\EmergencyHelp\\EmergencyHelp' . "\0" . 'contactNumber', '' . "\0" . 'App\\Models\\EmergencyHelp\\EmergencyHelp' . "\0" . 'addressLine1', '' . "\0" . 'App\\Models\\EmergencyHelp\\EmergencyHelp' . "\0" . 'addressLine2', '' . "\0" . 'App\\Models\\EmergencyHelp\\EmergencyHelp' . "\0" . 'addressLine3', '' . "\0" . 'App\\Models\\EmergencyHelp\\EmergencyHelp' . "\0" . 'addressLine4', '' . "\0" . 'App\\Models\\EmergencyHelp\\EmergencyHelp' . "\0" . 'postcode', '' . "\0" . 'App\\Models\\EmergencyHelp\\EmergencyHelp' . "\0" . 'webLink', '' . "\0" . 'App\\Models\\EmergencyHelp\\EmergencyHelp' . "\0" . 'service', '' . "\0" . 'App\\Models\\EmergencyHelp\\EmergencyHelp' . "\0" . 'description'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Models\\EmergencyHelp\\EmergencyHelp' . "\0" . 'id', '' . "\0" . 'App\\Models\\EmergencyHelp\\EmergencyHelp' . "\0" . 'name', '' . "\0" . 'App\\Models\\EmergencyHelp\\EmergencyHelp' . "\0" . 'contactNumber', '' . "\0" . 'App\\Models\\EmergencyHelp\\EmergencyHelp' . "\0" . 'addressLine1', '' . "\0" . 'App\\Models\\EmergencyHelp\\EmergencyHelp' . "\0" . 'addressLine2', '' . "\0" . 'App\\Models\\EmergencyHelp\\EmergencyHelp' . "\0" . 'addressLine3', '' . "\0" . 'App\\Models\\EmergencyHelp\\EmergencyHelp' . "\0" . 'addressLine4', '' . "\0" . 'App\\Models\\EmergencyHelp\\EmergencyHelp' . "\0" . 'postcode', '' . "\0" . 'App\\Models\\EmergencyHelp\\EmergencyHelp' . "\0" . 'webLink', '' . "\0" . 'App\\Models\\EmergencyHelp\\EmergencyHelp' . "\0" . 'service', '' . "\0" . 'App\\Models\\EmergencyHelp\\EmergencyHelp' . "\0" . 'description'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (EmergencyHelp $proxy) {
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
    public function getContactNumber(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getContactNumber', []);

        return parent::getContactNumber();
    }

    /**
     * {@inheritDoc}
     */
    public function setContactNumber(string $contactNumber): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setContactNumber', [$contactNumber]);

        parent::setContactNumber($contactNumber);
    }

    /**
     * {@inheritDoc}
     */
    public function getAddressLine1(): ?string
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
    public function setAddressLine2(string $addressLine2): void
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
    public function setAddressLine3(string $addressLine3): void
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
    public function setAddressLine4(string $addressLine4): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAddressLine4', [$addressLine4]);

        parent::setAddressLine4($addressLine4);
    }

    /**
     * {@inheritDoc}
     */
    public function getWeblink()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getWeblink', []);

        return parent::getWeblink();
    }

    /**
     * {@inheritDoc}
     */
    public function setWeblink($weblink)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setWeblink', [$weblink]);

        return parent::setWeblink($weblink);
    }

    /**
     * {@inheritDoc}
     */
    public function setService($service)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setService', [$service]);

        return parent::setService($service);
    }

    /**
     * {@inheritDoc}
     */
    public function getService()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getService', []);

        return parent::getService();
    }

    /**
     * {@inheritDoc}
     */
    public function setDescription($description)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDescription', [$description]);

        return parent::setDescription($description);
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDescription', []);

        return parent::getDescription();
    }

    /**
     * {@inheritDoc}
     */
    public function setPostCode($postcode)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPostCode', [$postcode]);

        return parent::setPostCode($postcode);
    }

    /**
     * {@inheritDoc}
     */
    public function getPostCode()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPostCode', []);

        return parent::getPostCode();
    }

}
