# Calculator Via Injection

This is a case study that aims to show one of the possible ways of injecting functionality in PHP language.


## How it works
 
We are given a `Calculator` class that requires an instance of `Calculable` as its constructor parameter. The
`Calculable` is just an abstraction of some calculations, which are represented by the `calculate` method, that
accepts a variable number of arguments ([variadic function](https://en.wikipedia.org/wiki/Variadic_function)). To
start using the injection, we need to define a piece of functionality (a math operation in our case) that conforms
to our abstraction, and provide its instance to the `Calculator` at the moment of the instantiation. The instance
of `Calculator` is going to retain the injected functionality and use it each time the calculation is requested.

```php
$addition = new Calculator(new Addition());
echo $addition->calculate(1, 2); // results in 3
```
for more usage examples, please see the [examples](examples/) folder.


## Notes

By default, the package provides four classes that correspond to the basic math operations (addition, subtraction,
multiplication, division). Each class uses the `Validator` trait to perform validation. The `Division` class overrides
the default trait's method and extends its functionality. For more information see the [Operations](src/Operations/) folder).

The validation of input arguments is implemented in the [Validator](src/Operations/Validator.php) trait. Therefore, every operation
might use the trait for validation, or might not. We don't force the `Calculable` implementations to use the predefined validation.

The decomposition might look strange, and it is. But this is just an example on how we can inject one object into another one
and assign a piece of behavior to a variable.


## Things to learn

[//]: # (@todo don't forget to update the line numbers)
Things that you can learn from this case study:
- [how the constructor dependency injection works](src/Calculator.php#L19)
- how to [delegate calls/messages to another object](src/Calculator.php#L34)
- how to [override and extend methods inherited from traits](src/Operations/Division.php#L30)


## License

The MIT License (MIT). Please see the [License file](LICENSE.md) for more information.