## Supermarket Checkout

This repository contains code to implement a supermarket style checkout system, where product are "scanned" one by one, and the total is calculated against a set of pricing rules.

The code is inspired by a YouTube [video](https://www.youtube.com/watch?v=5XywKLjCD3g) published on  [Laravel Daily](https://www.youtube.com/channel/UCTuplgOBi6tJIlesIboymGA) channel.

The video is about a job interview where the candidate was asked to satisfy some basic requirements to apply interactively a set of discount rules while the scanner passes the products.
In the requirements there was some examples of carts and expected totals, so it was a perfect task to improve my skills on [TDD](https://en.wikipedia.org/wiki/Test-driven_development). 
For this reason I've decided to write the code by myself and publish it on Github for future reference.

### Usage
The code has no "entry points", so to execute it you have just to run the tests.

First of all install dev dependencies after cloning the repository
```shell script
$ composer install
```

Then run `phpunit` tests with the script provided in `composer.json`
```shell script
$ composer test
``` 

Have fun exploring how the test was passed using the [Strategy Pattern](https://it.wikipedia.org/wiki/Strategy_pattern), start from `tests/Feature/CheckoutTest.php` and traverse the source trough the classes and methods used on the test code.

Since this was just a proof-of-concept, I didn't code any database interface object, but I've just used a _plain array_ sto store products and rules in a _repository_ class, where products are mapped to models and rules are considered as a _strategy_ classes to calculate the price against the quantity in the cart.
