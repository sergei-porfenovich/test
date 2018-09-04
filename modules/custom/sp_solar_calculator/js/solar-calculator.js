(function ($, Drupal, window, document) {
  Drupal.behaviors.basic = {
    attach: function (context, settings) {
      window.SavingsCalculatorOptions = {
        email: '',
        savingsType: 'Quantitative',
        carToggle: 'ON',
        batteriesToggle: 'ON',
        showWidget: 'SHOW'
      }
    }
  }
}(jQuery, Drupal, this, this.document))
