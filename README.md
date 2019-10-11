## Calculator Via Interface

A simple calculator app is written in PHP and implements mathematics operations through simple injected classes unified
with an interface.

Basic idea is to use Calculator class which receives something, that implements Operable interface, and two numerical arguments.
To make calculations we should execute the calculate() method. Calculation result depends on passed object implementation.
Don't treat this class seriously, here Abstract class would work better, but I wanted to keep the main idea, the source of
that project. That's why the final version of the class is over-engineered with Validator trait. The example of Calculator
class usage you can find in index.php file in the root directory.


This isn't a production solution, but only a training exercise which helps better understand how interfaces and DI work.  
Any ideas, suggestions, and reviews will be much appreciated :)