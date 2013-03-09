define(function(){
  CurrencyListView = Backbone.View.extend({

    attributes:{
      'data-role' : 'fieldcontain'
    }

   ,events: {
      "change select" : "triggerCurrencyChange",
    }

   ,triggerCurrencyChange: function() {
      var selected = this.$el.find('select option:selected')
      this.trigger("change:selectedCurrency", selected.text(), selected.val())
   }

   ,render: function() {

      var label = $('<label>').attr('for', 'select-currency')
        .text('Currency:')
      var select = $('<select>').attr('name', 'select-currency')
        .attr('id', 'select-currency')

      var option = $('<option>').val(1).text('USD')
      select.append(option)
      _.each(this.options.data, function(value, key, list){
        option = $('<option>').val(value).text(key)
        select.append(option)
      })

      this.$el.append(
        label
       ,select
      )

      return this
    }
  })

  return CurrencyListView
})
