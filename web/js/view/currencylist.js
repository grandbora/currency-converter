define(function(){
  CurrencyListView = Backbone.View.extend({

    attributes:{
      'data-role' : 'fieldcontain'
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


