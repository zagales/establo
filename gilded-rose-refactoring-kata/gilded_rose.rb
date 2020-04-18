class GildedRose

  def initialize(items)
    @items = items
  end

  def update_quality()
    @items.each do |item|
      update_item(item)
    end  
  end  

  def update_item item
    if is_legendary_item item
      return
    end
    if is_item_that_increase_quality_with_time item
      increase_item_quality item
    else
      decrease_item_quality item
    end  
    item.sell_in = item.sell_in - 1
    if item.sell_in < 0
      update_expired_item item
    end
  end

  def is_legendary_item item
    item.name == "Sulfuras, Hand of Ragnaros"
  end

  def is_item_that_increase_quality_with_time item
    item.name == "Aged Brie" or item.name == "Backstage passes to a TAFKAL80ETC concert"
  end

  def increase_item_quality item
    if item.quality >= 50
      return
    end    
    item.quality += 1
    if item.name == "Backstage passes to a TAFKAL80ETC concert"
      if item.sell_in < 11
        if item.quality < 50
          item.quality += 1
        end
      end
      if item.sell_in < 6
        if item.quality < 50
          item.quality += 1
        end
      end   
    end
  end

  def decrease_item_quality item
    if item.quality > 0
      item.quality = item.quality - 1
    end 
  end

  def remove_item_quality item
    item.quality = 0
  end

  def update_expired_item item
    if item.name != "Aged Brie"
      if item.name != "Backstage passes to a TAFKAL80ETC concert"
        decrease_item_quality item
      else
        remove_item_quality item
      end
    else
      increase_item_quality item
    end
  end
  
end

class Item
  attr_accessor :name, :sell_in, :quality

  def initialize(name, sell_in, quality)
    @name = name
    @sell_in = sell_in
    @quality = quality
  end

  def to_s()
    "#{@name}, #{@sell_in}, #{@quality}"
  end
end