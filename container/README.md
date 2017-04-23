# abc Frame: Service/DI Container

## What is the Service/DI Container?

The abc Frame Dependency Injection Container & Service Container is a
highly portable interface with several adapters to perform the actual
work.

You should not install the `abc/container` package directly.  Instead
you should install one of it's adapters that provide the functionality:

## What adapters are available?

| Feature            | league            | dice        | symfony      | php-di  | pimple | zend/di |
|:-------------------|:------------------|:------------|:-------------|:--------|:-------|:--------|
| **Available?**     | **Yes**           | **Yes**     | **Yes**      | **Yes** | **No** | **No**  |
| Delegation         | Native            | No          | Yes          |         |        |         |
| Service Providers  | Native            | No          | No           |         |        |         |
| Auto-Wiring        | Yes, with cfg [3] | Yes         | Yes          |         |        |         |
| Setter Injection   | Yes               | Yes         | Yes          |         |        |         |
| Factory Closures   | Yes               | Yes         | Yes          |         |        |         |
| Inflectors         | Yes               | Yes         | Yes          |         |        |         |
| PHP Array Cfg      | Yes               | Yes         | Yes          |         |        |         |
| PHP API Cfg        | Yes               | Yes         | Yes          |         |        |         |
| XML Cfg            | Polyfill          | Yes         | Yes          |         |        |         |
| JSON Cfg           | Polyfill          | Yes         | Yes          |         |        |         |
| Expressive Cfg [1] | No                | No          | Yes          |         |        |         |
| API Compatible [2] | Yes               | No          | Yes          |         |        |         |
| Annotation Support | No                | No          | No           | Yes [4] |        |         |
| Size of Library    | Good Balance      | Lightweight | Medium-Large |         |        |         |

 - [1]: Symfony allows for '%variables%' and other expansions and within symfony/config which carry over to it's container component.  However, you could also simply use `symfony/config` for your `abc/config` adapter and get the same effect.
 - [2]: API Compatible containers use the same interface as `abc/di`, as in a PSR-11 interface, plus `addArgument()`, `setParameter()`, and `register()`.  Migrating from these containers to the `abc/container` interface will be very easy.
 - [3]: The league/container requires enabling the `ReflectionContainer` delegate manually for auto-wiring support.  It _is_ native support, however.
 - [4]: While `php-di` supports annotation based injection, it will _never_ be natively supported in `abc/container`, and you will need to make your own decorator or desendant class to use it.  If you are considering this. please read [this excellent article by Tom Butler, the author of dice](https://r.je/php-annotations-are-an-abomination.html) on why annotations are evil first.


## Using `abc/container`

Unfortunately, for some very odd reason, no one has felt the need to
make a universal container layer.  Only the read methods have been
formalized -- `get()` and `has()` are php-fig standards, at least, but
no serious attempt has been made to normalize/formalize the plethora
of methods and configuration syntax used to "register", "add", "set",
"share", "lazyGet", "lazyNew",

Otherwise, there is _extreme_ variability between how rules and other
"write" operations are performed.  Since there at least is a standard
for reading, plus delegation, we can at least


with even of that, `layer-2/dice` not implementing them yet.



abc Frame's container uses a very similar API to league, with some minor
inconsistencies fixed:

    <?php
    use \abc\Container\Adapter\_your_adapter_ as abcContainer;
    
    $container = new abcContainer();

    # Let's start out by registering shared components:
    $container->shared("abc\CommandBus", "abc\CommandBus\Adapter\Tactician");
    $container->shared("abc\HttpRouter", "abc\HttpRouter\Adapter\League");
    
    # set() and register() are aliases of each other, and set a
    # non-shared binding
    $container->set('mailer', "\My\Mail\Stuff");
    
    # get() and has() are the regular, PSR-11 implementations.
    if($container->has('abc\HttpRouter')) { 
        $router = $container->get('abc\HttpRouter');
    }
    
    # create() and make() are available but marked as @deprecated so you
    # may move them to get().  
    
    #
   
        
    
    # Migration Note:
    # - With Symfony/Container, all "register()"  



