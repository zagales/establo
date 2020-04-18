class GildedRose

  def initialize(items)
    @items = items
  end

  def update_item(item)
    if item.name == "Sulfuras, Hand of Ragnaros"
      return
    end   

    if item.name == "Aged Brie" or item.name == "Backstage passes to a TAFKAL80ETC concert"      
      if item.quality < 50
        item.quality = item.quality + 1
        if item.name == "Backstage passes to a TAFKAL80ETC concert"
          if item.sell_in < 11
            if item.quality < 50
              item.quality = item.quality + 1
            end
          end
          if item.sell_in < 6
            if item.quality < 50
              item.quality = item.quality + 1
            end
          end
        end
      end
    else
      if item.quality > 0
        item.quality = item.quality - 1
      end    
    end
    item.sell_in = item.sell_in - 1
    if item.sell_in < 0
      update_expired_item item
    end
  end

  def update_quality()
    @items.each do |item|
      update_item(item)
    end  
  end

  def update_expired_item item
    if item.name != "Aged Brie"
      if item.name != "Backstage passes to a TAFKAL80ETC concert"
        if item.quality > 0
          item.quality = item.quality - 1
        end
      else
        item.quality = item.quality - item.quality
      end
    else
      if item.quality < 50
        item.quality = item.quality + 1
      end
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