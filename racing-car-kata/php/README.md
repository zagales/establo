Racing Car Katas
=================

In this repository you'll find starting code for five distinct problems. They could be code you inherited from a legacy code-base. Now you want to write unit tests for them, and that is harder than it needs to be. All of the code snippets fail to follow one or more of the SOLID principles.

For each exercise, you should identify which SOLID principles are not being followed by the code. There is only one class you are interested in writing tests for right now. As a first step, try to get some kind of test in place before you change the class at all. If the tests are hard to write, is that because of the problems with SOLID principles?

When you have some kind of test to lean on, refactor the code and make it testable. Take care when refactoring not to alter the functionality, or change interfaces which other client code may rely on. (Imagine there is client code in another repository that you can't see right now). Add more tests to cover the functionality of the particular class you've been asked to get under test.

Apply the unit testing style and framework you are most comfortable with. You can choose to use stubs or mocks or none at all. If you do, you are free to use the mocking tool that you prefer.

1. **TirePressureMonitoringSystem exercise**:  write the unit tests for the Alarm class. The Alarm class is designed to monitor tire pressure and set an alarm if the pressure falls outside of the expected range. The Sensor class provided for the exercise fakes the behaviour of a real tire sensor, providing random but realistic values.

2. **UnicodeFileToHtmlTextConverter exercise**: write the unit tests for the UnicodeFileToHtmlTextConverter class. The UnicodeFileToHtmlTextConverter class is designed to reformat a plain text file for display in a browser. For the Python and Java versions, there is an additional class "HtmlPagesConverter" which is slightly harder to get under test. It not only converts text in a file to html, it also supports pagination. It's meant as a follow up exercise.

3. **TicketDispenser exercise**: write the unit tests for the TicketDispenser. The TicketDispenser class is designed to be used to manage a queuing system in a shop. There may be more than one ticket dispenser but the same ticket should not be issued to two different customers.

4. **TelemetrySystem exercise**: write the unit tests for the TelemetryDiagnosticControls class. The responsibility of the TelemetryDiagnosticControls class is to establish a connection to the telemetry server (through the TelemetryClient), send a diagnostic request and successfully receive the response that contains the diagnostic info. The TelemetryClient class provided for the exercise fakes the behavior of the real TelemetryClient class, and can respond with either the diagnostic information or a random sequence. The real TelemetryClient class would connect and communicate with the telemetry server via tcp/ip.

5. **Leaderboard exercise**: (note this exercise is still being developed) Write the unit tests for the Leaderboard class, including races with self driving cars. The Leaderboard calculates driver points and rankings based on results from a number of races.


## TDD with Mock Objects: Design Principles and Emerging Properties

This was originally a fork of Luca Minudel's repo. He was using it for a study of TDD and Design principles. I am using it as a repository for storing exercises useful for people wishing to improve their skills with TDD and SOLID principles. Please look at my blog post ["SOLID principles and TDD"](http://coding-is-like-cooking.info/2012/09/solid-principles-and-tdd/) for background reading, or my book ["The Coding Dojo Handbook"](http://leanpub.com/codingdojohandbook).

- When you've had a go at these exercises yourself, you could look at the [proposed solutions] (https://github.com/lucaminudel/TDDwithMockObjectsAndDesignPrinciples/tree/master/TDDMicroExercises.ProposedSolution) in C#, Java, Javascript. If you've done the exercises in Python, you might be interested in my blog post ["SOLID exercises in Python"](http://coding-is-like-cooking.info/2012/09/solid-exercises-in-python/).

- For background reading about Luca's study, see the [paper] (https://github.com/lucaminudel/TDDwithMockObjectsAndDesignPrinciples/blob/master/Paper/mockobjects_emergingproperties.pdf?raw=true) and the [presentation] (https://github.com/lucaminudel/TDDwithMockObjectsAndDesignPrinciples/blob/master/Slides/TDD-SOLID.pdf?raw=true) from Luca's own repo.

# Racing Car Katas (PHP)

This is the PHP version of the Racing Car Katas.

## Installation

The project uses:

- PHP 7.2+
- [Composer](https://getcomposer.org)

Recommended:
- [Git](https://git-scm.com/downloads)

Clone the repository

```sh
git clone git@github.com:emilybache/Racing-Car-Katas.git
```

or

```shell script
git clone https://github.com/emilybache/Racing-Car-Katas.git
```

Install all the dependencies using composer

```sh
cd ./Racing-Car-Katas/php
composer install
```

## Dependencies

The project uses composer to install:

- [PHPUnit](https://phpunit.de/)
- [PHPStan](https://github.com/phpstan/phpstan)
- [Easy Coding Standard (ECS)](https://github.com/symplify/easy-coding-standard) 
- [PHP CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer/wiki)

## Folders

- `src` - Contains the five exercise:
  - TirePressureMonitoringSystem
  - TextConverter
  - TicketDispenser
  - TelemetrySystem
  - Leaderboard 
- `tests` - Contains the corresponding tests

## Testing

PHPUnit is used to run tests, to help this can be run using a composer script. To run the unit tests, from the root of
 the project run:

```shell script
composer test
```

On Windows a batch file has been created, similar to an alias on Linux/Mac (e.g. `alias pu="composer test"`), the same
 PHPUnit `composer test` can be run:

```shell script
pu
```

### Tests with Coverage Report

To run all test and generate a html coverage report run:

```shell script
composer test-coverage
```

The coverage report is created in /builds, it is best viewed by opening **index.html** in your browser.

The [XDEbug](https://xdebug.org/download) extension is required for coverage report generating. 

## Code Standard

Easy Coding Standard (ECS) is used to check for style and code standards, **PSR-12** is used.

### Check Code

To check code, but not fix errors:

```shell script
composer check-cs
``` 

On Windows a batch file has been created, similar to an alias on Linux/Mac (e.g. `alias cc="composer check-cs"`), the
 same PHPUnit `composer check-cs` can be run:

```shell script
cc
```

### Fix Code

Many code fixes are automatically provided by ECS, if advised to run --fix, the following script can be run:

```shell script
composer fix-cs
```

On Windows a batch file has been created, similar to an alias on Linux/Mac (e.g. `alias fc="composer fix-cs"`), the same
 PHPUnit `composer fix-cs` can be run:

```shell script
fc
```

## Static Analysis

PHPStan is used to run static analysis checks:

```shell script
composer phpstan
```

On Windows a batch file has been created, similar to an alias on Linux/Mac (e.g. `alias ps="composer phpstan"`), the
 same PHPUnit `composer phpstan` can be run:

```shell script
ps
```

**Happy coding**!