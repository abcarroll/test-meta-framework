# abc Framework

abc Framework isn't really a framework.

## abc is:

 - a set of **interfaces** for a wide variety of components.  you could
   implement these interfaces in your own projects to help drive
   framework interoperability.
 - a set of **adapters**, at least one per **interface**, and in many
   cases, more than one for each.  the **adapter packages hide
   well-known components from well-known frameworks behind a common
   interface**.
 - you are encouraged (by nature of the code) to use dependency
   injection and type hinting using the `abc\` interfaces within your
   application's code.



## the result is:

 - No need for an additional layer (sometimes, this is a service layer)
   to make third party components modular.
 - **No more service containers**.  By nature of the framework, you are
   heavily encouraged to use dependency injection instead.
 - Design by Contract: Classes/objects that consume `abc\` components
   within their constructor (or setter) have a very explicit contract
   handed to them.
 - All `abc\` components are instantly and forever substitutable and
   modular.  As in, the Liskov Substitution Principle. (L in SOLID)

## the downsides are:

 - We don't have a component for every situation.  You'll probably still
   need to bring in more third party components.   You are welcome to
   submit new components, however.
 - APIs can be complex.  Even components (say a router) that serve the
   exact same function have wildly differing APIs.  Sometimes, this
   makes it difficult to use or migrate to `abc\` components, especially
   when the API is different than one you've already designed for. In
   this case, you can make another front-end adapter, but this isn't
   generally best case.
