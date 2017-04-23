# abc Frame: Command Bus

## What is the abc Frame?

The abc Frame is a meta-framework. This means that we don't write the
components you use or any of their logic.

Instead, we supply you with a highly adaptable Interface, called the
*port*, as well as multiple *adapters* to it. This allows you to switch
between 'back-ends' of any third party component in your software
without changing a *single line of code*.

For more information please see the
[abc-php/abc-php](http://github.com/ab-php/abc) repository for detailed
documentation and best practices.

## What is the Command Bus?

The Command Bus is for implementing a Command Pattern, sometimes called
a Service Layer.

The pattern works like this:

- You create a Command Bus (the producer or 'sending side').
- You attach middleware to it (the consuming, or 'receiving side').
- You create a message by creating a message object and hand it to the
  command bus's dispatch event which is `handle()` in our API.
- The CommandBus would then use the Middleware to execute the command
  which may be executed in the same script, on the same server, or in
  the case of network-based middleware may be a remote worker using any
  arbitrary protocol. *You* decide what is best.

## What types of adapters/middleware do `abc/command-bus` support?

`abc/command-bus` doesn't support _any_ middleware or even the bare
command dispatch on it's own. However, you may use any of:

### `theleaguephp/tactician` adapter

The `abc/queue` API is based on the tactician API, so their
documentation is applicable as well.

**However, please note, for some unexplained reason, the tactician
  interfaces are backwards from basically every Command Bus
  implementation.  Typically, the CommandBus implements an execute()
  and Middleware (or Decorator, Handler) implements handle(). Therefore,
  we have put them back to their typical interfaces in `abc`'s
  adapters.**

- `abc/command-bus` has full native support.
- Logger - PSR-3 Logging
- Container - Call methods from a `container-interop` (or PSR-11)
  container
- Doctrine - Wrap in an ORM Transaction
- Events - Fire `symfony/event-dispatcher` (or native
  `abc/event-dispatcher` events.
- Locking - Built-in locking support
- Bernard Bridge (or native `abc/queue`)
  - Google App Engine
  - Doctrine DBAL (Another)
  - Flat File
  - IronMQ
  - MongoDB
  - Pheanstalk
  - AMQP / PhpAmqp / RabbitMQ
  - Redis via Redis Extension or Predis
  - Amazon AWS Simple Queue Service (SQS, HTTP Based)

### `adamnicholson/Chief`

`adamnicholson/Chief` is an older implementation that is not as actively
as maintained as `thephpleague`'s implementation, however it has it's
own pro's and con's vs. tactician.

