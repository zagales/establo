Our first try in mobprogramming (remotely) through [score-keeper-kata](https://kata-log.rocks/score-keeper-kata)

* [Usage](#usage)
* [Para la próxima sesión](#para-la-proxima-sesion)
* [Open interesting discussions](#open-interesting-discussions)
* [Learning opportunities](#learning-opportunities)
* [Readings](#readings)
* [Research on domain concepts](#research-on-domain-concepts)

## Usage

Collaboration tools:
- [Visual Code](https://code.visualstudio.com/)
- [Live Share Extension Pack](https://marketplace.visualstudio.com/items?itemName=MS-vsliveshare.vsliveshare-pack)
- Google Hangouts

Requirements:
- php 7.3
- composer

Install:
```
composer install
```

Run tests:
```
./vendor/bin/phpunit --colors --testsuite scorekeeper
```

## Para la próxima sesión

- Los nombres de los tests relacionados con `ScoreFormatter` nos indican que quizás es mejor representar parte de la información en el nombre de la propia clase. Darle una vuelta
- Probar con los `DataProviders` resolver los tests: 
    - `test_scores_under_ten_is_represented_by_seven_characters_string`
    - `test_scores_under_one_hundred_is_represented_by_seven_characters_string`
    - `test_scores_under_one_thousand_is_represented_by_seven_characters_string`
- Ver cómo podemos testear parte de lo que ya estamos testeando en `ScoreKeeperTest` en `TeamTest`


## Open interesting discussions

- Among the `str_pad` and `sprintf` php functions, which one is more appropriate in the context of `ScoreKeeper`?
- Where should the `formatting part` live?
- What should be the responsibilities of `Team`?

## Learning opportunities

### Organizing Tests

We wanted to keep the structure of the project simple by following the convention `the fewer directories and files the simpler`. 

So we started in the simpler way, without the recomended structure of directories like `src` and `tests`. Instead we started with two `.php` files in the root directory, `./ScoreKeeper.php` for the SUT (System Under Test) and `./ScoreKeeperTest.php` for the tests. As long as we had only one file for the tests it was easy to run them executing `./vendor/bin/phpunit --colors ScoreKeeperTest.php`, but when we had to create more files this approach no longer worked. We solved the problem with [Test Suite feature](https://phpunit.readthedocs.io/en/9.0/organizing-tests.html#composing-a-test-suite-using-the-filesystem) of phpunit.

Learning opportunity: Which are the features provided by phpunit to organize and run tests and how we can use them?

## Readings

- [Use An Ask, Don’t Tell Policy With Ruby](http://patshaughnessy.net/2014/2/10/use-an-ask-dont-tell-policy-with-ruby)
- [Naming standards for unit tests](https://osherove.com/blog/2005/4/3/naming-standards-for-unit-tests.html)

## Research on domain concepts

[score (noun)](https://dictionary.cambridge.org/dictionary/english/score)

the number of points achieved or obtained in a game or other competition:
- The final score was 103–90.
- Who’s going to keep score when we play bridge?

[score (verb)](https://dictionary.cambridge.org/dictionary/english/score)

to win or obtain a point or something else that gives you an advantage in a competitive activity, such as a sport, game, or test:
- Has either team scored yet?
- The Packers scored a touchdown with two minutes to go in the football game.

[keeper (noun)](https://dictionary.cambridge.org/dictionary/english/keeper)

someone responsible for guarding or taking care of a person, animal, or thing:
- an animal keeper
- Each of the contest judges was assigned a keeper.

[format (noun)](https://dictionary.cambridge.org/dictionary/english/format)

the way in which something is shown or arranged:
- The two candidates could not agree on the format of the TV debate.
