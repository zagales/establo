require File.join(File.dirname(__FILE__), 'gilded_rose')
require 'test/unit'

class TestUntitled < Test::Unit::TestCase

  def test_foo
    items = [Item.new("foo", 0, 0)]
    GildedRose.new(items).update_quality()
    assert_equal items[0].name, "foo"
  end

  #All items have a SellIn value which denotes the number of days we have to sell the item
  #At the end of each day our system lowers both values for every item
  def test_can_lower_number_of_sell_in_days
    items = [Item.new("foo", 10, 0)]
    GildedRose.new(items).update_quality()
    assert_equal items[0].sell_in, 9
  end

  #All items have a Quality value which denotes how valuable the item is
  def test_can_lower_quality
    initialQuality = 100
    items = [Item.new("foo", 10, initialQuality)]
    GildedRose.new(items).update_quality()
    assert_true items[0].quality < initialQuality
  end

  #Once the sell by date has passed, Quality degrades twice as fast
  def test_quality_degrades_twice_as_fast
    initialSellIn = 0
    initialQuality = 10    
    expectedQuality = 8
    items = [Item.new("foo", initialSellIn, initialQuality)]
    GildedRose.new(items).update_quality()
    assert_equal items[0].quality, expectedQuality
  end

  #The Quality of an item is never negative
  def test_quality_is_never_negative
    minimumQuality = 0
    items = [Item.new("foo", 0, 0),
            Item.new("foo", -1, 0)]
    GildedRose.new(items).update_quality()
    assert_true items[0].quality >= minimumQuality
    assert_true items[1].quality >= minimumQuality
  end

  #“Aged Brie” actually increases in Quality the older it gets
  def test_aged_brie_increases_in_quality_the_older_it_gets
    initialQuality = 20
    expectedQuality = 22
    items = [Item.new("Aged Brie", 10, initialQuality)]
    GildedRose.new(items).update_quality()
    GildedRose.new(items).update_quality()
    assert_equal items[0].quality, expectedQuality
  end    

  #The Quality of an item is never more than 50
  def test_quality_of_item_cannot_be_over_50
    initialQuality = 50
    maximumQuality = 50
    items = [
      Item.new("foo", 10, initialQuality),
      Item.new("Aged Brie", 10, initialQuality),
      Item.new("Sulfuras, Hand of Ragnaros", 10, initialQuality),
      Item.new("Backstage passes to a TAFKAL80ETC concert", 12, initialQuality),
      Item.new("Backstage passes to a TAFKAL80ETC concert", 10, initialQuality),
      Item.new("Backstage passes to a TAFKAL80ETC concert", 5, initialQuality),    
    ]
    GildedRose.new(items).update_quality()
    assert_true items[0].quality <= maximumQuality
    assert_true items[1].quality <= maximumQuality
    assert_true items[2].quality <= maximumQuality
    assert_true items[3].quality <= maximumQuality
    assert_true items[4].quality <= maximumQuality
    assert_true items[5].quality <= maximumQuality    
  end

  #“Sulfuras”, being a legendary item, never has to be sold or decreases in Quality
  def test_sulfuras_never_to_be_sold_or_decreases
    initialSellIn = 10
    initialQuality = 50
    items = [Item.new("Sulfuras, Hand of Ragnaros", initialSellIn, initialQuality)]
    GildedRose.new(items).update_quality()
    assert_equal items[0].sell_in, initialSellIn
    assert_equal items[0].quality, initialQuality
  end
  #“Backstage passes”, like aged brie, increases in Quality as it’s SellIn value approaches; Quality increases by 2 when there are 10 days or less and by 3 when there are 5 days or less but Quality drops to 0 after the concert

end