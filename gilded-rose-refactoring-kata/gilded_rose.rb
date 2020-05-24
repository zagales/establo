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

    item_updater = get_item_updater item
    item_updater.update
  end

  def get_item_updater item
    return DefaultUpdater.new(item)    
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

class ItemUpdater
  attr_accessor :item

  def initialize(item)
    @item = item
  end
  
  def update()
    unless changes_over_time
      return
    end

    if gains_quality_over_time
      increase_quality
    else 
      decrease_quality
    end

    decrease_sell_in
    decrease_quality_if_expired
  end

  def gains_quality_over_time
    return false
  end

  def changes_over_time
    return true
  end

  def decrease_quality
    if @item.quality > 0
      @item.quality = @item.quality - 1
    else
      @item.quality = 0
    end
  end

  def decrease_sell_in
    @item.sell_in = @item.sell_in - 1
  end

  def decrease_quality_if_expired
    if @item.sell_in < 0
      decrease_quality
    end
  end  
end

class DefaultUpdater < ItemUpdater
  def update_quality
    decrease_quality
  end
end

class SulfurasUpdater < ItemUpdater
  def changes_over_time
    return false
  end 
end

class AgedBrieUpdater < ItemUpdater
  def increase_quality
    if @item.quality < 50
      @item.quality = @item.quality + 1
    end
  end
  
  def gains_quality_over_time
    return true
  end
end

class BackstagePassUpdater < ItemUpdater 
  def decrease_quality_if_expired
    if @item.sell_in < 0
      @item.quality = 0
    end
  end 

  def increase_quality
    if @item.quality >= 50
      return 
    end

    if @item.sell_in > 5 and @item.sell_in < 11
      @item.quality += 2
      return
    end

    if @item.sell_in < 6
      @item.quality += 3
      return
    end

    @item.quality += 1
  end 
  
  def gains_quality_over_time
    return true
  end
end

class ConjuredUpdater < ItemUpdater
  def decrease_quality
    super
    super        
  end
end
