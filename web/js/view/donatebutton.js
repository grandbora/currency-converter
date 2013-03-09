define(function(){
  DonateButtonView = Backbone.View.extend({

    tagName: 'a'

   ,attributes:{
      'href':'#'
     ,'data-role':'button'
     ,'data-inline':'true'
    }

   ,events: {
      "click" : "donate",
    }

   ,donate: function() {
    debugger
      url = '/donate?'
      url += 'value=' + this.options.convertedValue
      url += '&currency=' + this.options.currency
      window.location.replace(url) 
    }

   ,update: function(currency, rate) {

      var convertedValue = this.options.originalValue / rate
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
