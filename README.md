# Calculator Via Injection

This is a case study that aims to show one of the possible ways of injecting functionality in PHP language.


## How it works
 
We are given a `Calculator` class that requires an instance of `Calculable` as its constructor parameter. The
`Calculable` is just an abstraction of some calculations, which are represented by the `calculate` method, that
accepts a variable number of arguments ([variadic function](https://en.wikipedia.org/wiki/Variadic_function)). To
start using the injection, we need to define a piece of functionality (a math operation in our case) that conforms
to our abstraction, and provide its instance to the `Calculator` at the moment of the instantiation.

```php
$addition = new Calculator(new Addition());
echo $addition->calculate(1, 2); // results in 3
```
for more usage examples, please see the [examples](examples/) folder.


## Notes

By default, the package provides four classes that correspond to the basic math operations (addition, subtraction,
multiplication, division). Each class uses the `Validator` trait to perform validation. The `Division` class overrides
the default trait's method and extends its functionality. For more information see the [Operations](src/Operations/) folder).

The decomposition might look strange, and it is. But this is just an example on how we can inject one object into another one
and assign a piece of behavior to a variable. 


## License

The MIT License (MIT). Please see the [License file](LICENSE.md) for more information.