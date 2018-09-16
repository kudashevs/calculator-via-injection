## Calculator Via Interface

A simple calculator app written in PHP with PHPUnit tests which implements mathematics operators through interface.

Basic idea is to use CalculatorGenerator class which receive class (implements interface IOperator) and two numerical arguments.
After class creation we must execute the calculate() method. Calculation result rely on passed class-argument implementation.
The example of CalculatorGenerator class usage you can find in index.php file in the root directory.

The main advantages of this approach is:
* security (type-hint of a class-argument in constructor guarantees right class instance)
* scalability (you can simply add any new mathematics operator at any time through the interface)
* maintainability (you can simply add new operators without need to make any change in main functionality)
* testability (you can easily test any new operator implementation separately from other functionality)


This is not ideal solution and only a case study on how to implement some functionality through interfaces.  
Any ideas, suggestions, issues, code reviews and comments are highly welcome :)