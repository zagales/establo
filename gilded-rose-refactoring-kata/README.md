# Overview

Our first try in ruby (remotely) through [GildedRose Refactoring Kata](https://github.com/emilybache/GildedRose-Refactoring-Kata).

* [Usage](#usage)

## Usage

Collaboration tools:
- [Visual Code](https://code.visualstudio.com/)
- [Live Share Extension Pack](https://marketplace.visualstudio.com/items?itemName=MS-vsliveshare.vsliveshare-pack)
- Google Hangouts

Environment eequirements:
- ruby 2.5

Run tests:
```
ruby gilded_rose_tests.rb
```

Run single test, eg `test_quality_is_never_negative`:
```
ruby gilded_rose_tests.rb -n test_quality_is_never_negative
```

After running tests o single test, coverege can be checked opening `coverage/index.html` in the browser. Thanks to [simplecov](https://github.com/colszowka/simplecov)

Read the [requirements](./GildedRoseRequirements.txt)

Run the program in order to understend better what is going on, eg: check invetory status for the next 2 days:
```
ruby texttest_fixture.rb 2
``` 

The output should be something like this:
```
⇒  ruby texttest_fixture.rb 2
OMGHAI!
-------- day 0 --------
name, sellIn, quality
+5 Dexterity Vest, 10, 20
Aged Brie, 2, 0
Elixir of the Mongoose, 5, 7
Sulfuras, Hand of Ragnaros, 0, 80
Sulfuras, Hand of Ragnaros, -1, 80
Backstage passes to a TAFKAL80ETC concert, 15, 20
Backstage passes to a TAFKAL80ETC concert, 10, 49
Backstage passes to a TAFKAL80ETC concert, 5, 49
Conjured Mana Cake, 3, 6

-------- day 1 --------
name, sellIn, quality
+5 Dexterity Vest, 9, 19
Aged Brie, 1, 1
Elixir of the Mongoose, 4, 6
Sulfuras, Hand of Ragnaros, 0, 80
Sulfuras, Hand of Ragnaros, -1, 80
Backstage passes to a TAFKAL80ETC concert, 14, 21
Backstage passes to a TAFKAL80ETC concert, 9, 50
Backstage passes to a TAFKAL80ETC concert, 4, 50
Conjured Mana Cake, 2, 5

-------- day 2 --------
name, sellIn, quality
+5 Dexterity Vest, 8, 18
Aged Brie, 0, 2
Elixir of the Mongoose, 3, 5
Sulfuras, Hand of Ragnaros, 0, 80
Sulfuras, Hand of Ragnaros, -1, 80
Backstage passes to a TAFKAL80ETC concert, 13, 22
Backstage passes to a TAFKAL80ETC concert, 8, 50
Backstage passes to a TAFKAL80ETC concert, 3, 50
Conjured Mana Cake, 1, 4
```