# Overview

Our first try in mobprogramming (remotely) through [score-keeper-kata](https://kata-log.rocks/score-keeper-kata) and [Visual Code](https://code.visualstudio.com/)

## Usage

Requirements:
- php 7.3
- composer

Install:
```
composer install
```

Run tests:
```
./vendor/bin/phpunit --colors ScoreKeeperTest.php
```

## Research on domain concepts

### Score
[score *noun* (POINTS)](https://dictionary.cambridge.org/dictionary/english/score)

the number of points achieved or obtained in a game or other competition:
- The final score was 103–90.
- Who’s going to keep score when we play bridge?

[score *verb* (WIN)](https://dictionary.cambridge.org/dictionary/english/score)

to win or obtain a point or something else that gives you an advantage in a competitive activity, such as a sport, game, or test:
- Has either team scored yet?
- The Packers scored a touchdown with two minutes to go in the football game.

### Keeper
[keeper *noun*](https://dictionary.cambridge.org/dictionary/english/keeper)

someone responsible for guarding or taking care of a person, animal, or thing:
- an animal keeper
- Each of the contest judges was assigned a keeper.

### Format
[format *noun*](https://dictionary.cambridge.org/dictionary/english/format)

the way in which something is shown or arranged:**
- The two candidates could not agree on the format of the TV debate.

## Open interesting discussions

- Among the `str_pad` and `sprintf` php functions, which one is more appropriate in the context of `ScoreKeeper`?
- Where should the `formatting part` live?
- What should be the responsibilities of `Team`?

## Readings

- [Use An Ask, Don’t Tell Policy With Ruby](http://patshaughnessy.net/2014/2/10/use-an-ask-dont-tell-policy-with-ruby)