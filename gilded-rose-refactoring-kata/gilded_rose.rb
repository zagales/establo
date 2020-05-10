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
    if item.name == "Sulfuras, Hand of Ragnaros"
      SulfurasUpdater.new(item).update
      return
    end

    if item.name == "Aged Brie"
      AgedBrieUpdater.new(item).update
      return
    end

    if item.name == "Backstage passes to a TAFKAL80ETC concert"
      BackstagePassUpdater.new(item).update
      return
    end

    if item.name == "Conjured"
      ConjuredUpdater.new(item).update
      return
    end

    DefaultUpdater.new(item).update
    
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


class DefaultUpdater
  attr_accessor :item

  def initialize(item)
    @item = item
  end

  def update()
    if @item.quality > 0 
      @item.quality = @item.quality - 1  
    end

    decrease_sell_in

    if @item.sell_in < 0
      @item.quality = @item.quality - 1
    end

    if @item.quality < 0
      @item.quality = 0
    end
  end

  def decrease_sell_in
    @item.sell_in = @item.sell_in - 1
  end
end

class SulfurasUpdater < DefaultUpdater
  def update()
  end
end

class AgedBrieUpdater < DefaultUpdater
  def update()
    if @item.quality < 50
      @item.quality = @item.quality + 1
    end

    decrease_sell_in

  end
end

class BackstagePassUpdater < DefaultUpdater
  def increase_quality item
    if item.sell_in > 5 and item.sell_in < 11
      item.quality += 2
      return
    end

    if item.sell_in < 6
      item.quality += 3
      return
    end

    item.quality += 1
  end

  def update()
    if @item.quality < 50
      increase_quality @item
    end

    decrease_sell_in

    if @item.sell_in < 0
      @item.quality = 0
    end
  end
end

class ConjuredUpdater < DefaultUpdater
   def update()
    if @item.quality <= 1
      @item.quality = 0
    else
      @item.quality = @item.quality - 2
    end

    decrease_sell_in
  end  
end

