define(function(){
  DonateButtonView = Backbone.View.extend({

    tagName: 'a'

   ,attributes:{
      'href':'#'
     ,'data-role':'button'
     ,'data-inline':'true'
    }

   ,update: function(currency, rate) {

      convertedValue = this.options.originalValue / rate
      this.options.convertedValue = Math.round(convertedValue * 100) / 100
      this.options.currency = currency

      this.$el.find('.ui-btn-text').text(this.options.convertedValue + ' ' + currency)
    }

   ,render: function() {
      return this
    }
  })

  return DonateButtonView
})
