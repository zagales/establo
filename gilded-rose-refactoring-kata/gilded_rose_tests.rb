require 'simplecov'
SimpleCov.start

require File.join(File.dirname(__FILE__), 'gilded_rose')
require 'test/unit'

class TestUntitled < Test::Unit::TestCase

  ITEM_AGED_BRIE = "Aged Brie"
  ITEM_SULFURAS = "Sulfuras, Hand of Ragnaros"
  ITEM_BACKSTAGE_PASS = "Backstage passes to a TAFKAL80ETC concert"
  NO_SPECIAL_ITEM = "foo"

  def test_foo
    items = [Item.new(NO_SPECIAL_ITEM, 0, 0)]
    GildedRose.new(items).update_quality()
    assert_equal items[0].name, NO_SPECIAL_ITEM
  end

  #All items have a SellIn value which denotes the number of days we have to sell the item
  #At the end of each day our system lowers both values for every item
  def test_can_lower_number_of_sell_in_days
    items = [Item.new(NO_SPECIAL_ITEM, 10, 0)]
    GildedRose.new(items).update_quality()
    assert_equal items[0].sell_in, 9
  end

  #All items have a Quality value which denotes how valuable the item is
  def test_can_lower_quality
    initialQuality = 100
    items = [Item.new(NO_SPECIAL_ITEM, 10, initialQuality)]
    GildedRose.new(items).update_quality()
    assert_true items[0].quality < initialQuality
  end

  #Once the sell by date has passed, Quality degrades twice as fast
  def test_quality_degrades_twice_as_fast
    initialSellIn = 0
    expectedQuality = 8
    initialQuality = 10
    items = [Item.new(NO_SPECIAL_ITEM, initialSellIn, initialQuality)]
    GildedRose.new(items).update_quality()
    assert_equal items[0].quality, expectedQuality
  end

  #The Quality of an item is never negative
  def test_quality_is_never_negative
    initialSellIn = 0
    initialQuality = 0
    expectedMinimumQuality = 0
    items = [
      Item.new(NO_SPECIAL_ITEM, initialSellIn, initialQuality),
      Item.new(ITEM_AGED_BRIE, initialSellIn, initialQuality),
      Item.new(ITEM_SULFURAS, initialSellIn, initialQuality),
      Item.new(ITEM_BACKSTAGE_PASS, initialSellIn, initialQuality),
    ]
    GildedRose.new(items).update_quality()
    assert_true items[0].quality >= expectedMinimumQuality
    assert_true items[1].quality >= expectedMinimumQuality
    assert_true items[2].quality >= expectedMinimumQuality
    assert_true items[3].quality >= expectedMinimumQuality
  end

  #“Aged Brie” actually increases in Quality the older it gets
  def test_aged_brie_increases_in_quality_the_older_it_gets
    initialQuality = 20
    expectedQuality = 22
    items = [Item.new(ITEM_AGED_BRIE, 10, initialQuality)]
    GildedRose.new(items).update_quality()
    GildedRose.new(items).update_quality()
    assert_equal items[0].quality, expectedQuality
  end

  #The Quality of an item is never more than 50
  def test_quality_of_item_cannot_be_over_50
    initialQuality = 50
    maximumQuality = 50
    randomSellIn = 10
    items = [
      Item.new(NO_SPECIAL_ITEM, randomSellIn, initialQuality),
      Item.new(ITEM_AGED_BRIE, randomSellIn, initialQuality),
      Item.new(ITEM_SULFURAS, randomSellIn, initialQuality),
      Item.new(ITEM_BACKSTAGE_PASS, randomSellIn, initialQuality),
    ]
    GildedRose.new(items).update_quality()
    assert_true items[0].quality <= maximumQuality
    assert_true items[1].quality <= maximumQuality
    assert_true items[2].quality <= maximumQuality
    assert_true items[3].quality <= maximumQuality
  end

  #“Sulfuras”, being a legendary item, never has to be sold or decreases in Quality
  def test_sulfuras_never_to_be_sold_or_decreases
    initialSellIn = 10
    initialQuality = 50
    items = [Item.new(ITEM_SULFURAS, initialSellIn, initialQuality)]
    GildedRose.new(items).update_quality()
    assert_equal items[0].sell_in, initialSellIn
    assert_equal items[0].quality, initialQuality
  end

  #“Backstage passes”, like aged brie, increases in Quality as it’s SellIn value approaches;
  #Quality increases by 2 when there are 10 days or less
  #and by 3 when there are 5 days or less but Quality drops to 0 after the concert
  def test_backstage_passes_quality_life_cycle_more_than_10_days_left
    initialQuality = 10
    daysLeft = 11
    qualityIncrease = 1
    expectedQuality = initialQuality + qualityIncrease
    items = [Item.new(ITEM_BACKSTAGE_PASS, daysLeft, initialQuality)]

    GildedRose.new(items).update_quality()

    assert_equal expectedQuality, items[0].quality
  end

  def test_backstage_passes_quality_life_cycle_10_days_left
    initialQuality = 10
    daysLeft = 10
    qualityIncrease = 2
    expectedQuality = initialQuality + qualityIncrease
    items = [Item.new(ITEM_BACKSTAGE_PASS, daysLeft, initialQuality)]

    GildedRose.new(items).update_quality()

    assert_equal expectedQuality, items[0].quality
  end

  def test_backstage_passes_quality_life_cycle_5_days_left
    initialQuality = 10
    daysLeft = 5
    qualityIncrease = 3
    expectedQuality = initialQuality + qualityIncrease
    items = [Item.new(ITEM_BACKSTAGE_PASS, daysLeft, initialQuality)]

    GildedRose.new(items).update_quality()

    assert_equal expectedQuality, items[0].quality
  end

  def test_backstage_passes_quality_life_cycle_0_days_left
    initialQuality = 10
    daysLeft = 0
    expectedQuality = 0
    items = [Item.new(ITEM_BACKSTAGE_PASS, daysLeft, initialQuality)]

    GildedRose.new(items).update_quality()

    assert_equal expectedQuality, items[0].quality
  end

  def test_conjured_items_decrease_quality_twice
    initialQuality = 10
    daysLeft = 5
    expectedQuality = 8

    items = [Item.new("Conjured", daysLeft, initialQuality)]

    GildedRose.new(items).update_quality()

    assert_equal expectedQuality, items[0].quality
  end

end