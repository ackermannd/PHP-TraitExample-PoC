PHP-TraitExample-PoC
====================

This is a Proof of Concept how you COULD use PHP Traits without risking tight coupling of classes. It's based on the concept of providing an object with the ability to use other objects, rather then provide them with the raw functionality via the trait.

Disclaimer: I do not promote the usage of Traits in this way or want to demote any other way. It's just a Proof of Concept against the often heard complaint that Traits would encourage tight coupling of classes. 

Concept
=======
As mentioned this concept is based on the philosophy to provide objects with the ability to use other objects, rather then providing them with the raw functionality via the Traits. Take for example __Logging__ or __Caching__. Normally you would want that you have the ability to cache data or log some information everywhere in your application. Also, you would normally want to have on centralized Service for both. 

For this Example, __Logging__ is done via one centralized class, __Logger.php__. 
The abilty to use the __Logger.php__ class will be bundled in the __Loggable Trait__

    <?php
    //Traits/Loggable.php
    trait Loggable 
    {
      protected $_traitLogger = null;
      
      public function setLogger($logger) {
              $this->_traitLogger = $logger;
              return $this;
      }
      
      public function getLogger() {
              return $this->_traitLogger;
      }
      
      public function log($string = '', $loglevel = null) {
              if ($this->_traitLogger !== null) {
                      return $this->_traitLogger->log($string, $loglevel);    
              }
              return null;
      }        
    }
    
As you can see, the trait only provides the object with the ability to get a Logger instance set and to pass through the __log()__ method if an instance is set. This way we could write our application code like so: 

    //Example.php
    namespace ackermannd\traitex;
    
    
    use ackermannd\traitex\Traits\Loggable;
    use ackermannd\traitex\Traits\Cachable;
    
    class Example {
        use Loggable, Cachable;
    }
    
    //index.php
    use ackermannd\traitex\Example;
    
    $ex = new Example();
    $ex->log('SomeLoggingInfo');

The code would run without any errors but without logging anything either. If we now want to activate logging for the Example Object we would only have to to something like this: 

    use ackermannd\traitex\Logger;
    use ackermannd\traitex\Example;
    
    $ex = new Example();
    $ex->setLogger(new Logger());
    $ex->log('SomeLoggingInfo');
