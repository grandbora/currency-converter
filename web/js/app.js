define(['view/currencylist', 'view/donatebutton'], function(CurrencyListView, DonateButtonView){
  App = function(){}

  App.prototype.start = function(){

    var currencyListView = new CurrencyListView({
      data:currencyListData
    })

    var buttonList = [
      new DonateButtonView({
        originalValue:10
      })
     ,new DonateButtonView({
        originalValue:25
      })
     ,new DonateButtonView({
        originalValue:50
      })
     ,new DonateButtonView({
        originalValue:100
      })
    ]

    var currencyListEl = currencyListView.render().$el

    $('body').append(
      currencyListEl
    )

    _.each(buttonList, function(button){
      currencyListView.on('change:selectedCurrency', button.update, button)
      var buttonEl = button.render().$el
      $('body').append(buttonEl)
    })

    currencyListView.triggerCurrencyChange() // in order to setup default selected value
  }

  return App
})