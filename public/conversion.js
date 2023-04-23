/**
  Makes an AJAX request to convert a given amount from the selected currency to USD 
  using the API provided by api-ninjas.com.

  @param {number} amount - The amount to convert.
  @param {string} selectedCurrency - The currency to convert from.
  @return {void}
*/
function setCurrency(amount, selectedCurrency)
{
    $.ajax({
        method: 'GET',
        url: `https://api.api-ninjas.com/v1/convertcurrency?want=USD&have=${selectedCurrency}&amount=${amount}`,
        contentType: 'application/json',
        async: true,
        success: function(result) {
            var currentDate = getCurrentDate();

            addRow(amount, selectedCurrency, 'USD', result.new_amount, currentDate);
            addHistorical(amount, selectedCurrency, 'USD', result.new_amount, currentDate);
            console.log(result.new_amount);
        },
        error: function ajaxError(jqXHR) {
            console.error('Error: ', jqXHR.responseText);
        }
    });
}

/**
  Sends an AJAX POST request to save the conversion data into the historical database table.
  @param {number} quantity - The quantity of the source currency.
  @param {string} sourceCurrency - The ISO code of the source currency.
  @param {string} targetCurrency - The ISO code of the target currency.
  @param {number} amountConverted - The amount converted from the source currency to the target currency.
  @param {string} creationDate - The creation date of the conversion in YYYY-MM-DD format.
*/
function addHistorical(quantity, sourceCurrency, targetCurrency, amountConverted, creationDate)
{
  var data = {
      "quantity": quantity,
      "sourceCurrency": sourceCurrency,
      "targetCurrency": targetCurrency,
      "amountConverted": amountConverted,
      "creationDate": creationDate
  };

  $.ajax({
      url: historicalSaveUrl,
      type: 'POST', 
      data: JSON.stringify(data),
      success: function(respuesta) { 
        $('#start').hide();
        $('.table').removeClass("visually-hidden");
        console.log(respuesta); 
      },
      error: function(xhr, status, error) {
        console.log(error);
      }
  });
}

/**
  Converts a given amount of money in a selected currency to USD using an API call,
  and displays the result in a table.
  @return {void}
*/
function convert()
{
    var amount = parseFloat($('#amount').val());

    if(isNaN(amount) || amount <= 0 ){
        alert('Enter a valid amount');
        return false;
    }

    var selectedCurrency = $('select.form-select').val();
    setCurrency(amount, selectedCurrency);
}

/**
  Returns the current date in the format "YYYY-MM-DD".
  @returns {string} - The current date in the format "YYYY-MM-DD".
*/
function getCurrentDate()
{
    var currentDate = new Date();
    var year = currentDate.getFullYear();
    var month = (currentDate.getMonth() + 1).toString().padStart(2, '0');
    var day = currentDate.getDate().toString().padStart(2, '0');
    var creationDate = year + '-' + month + '-' + day;

    return creationDate;
}

/**
  Adds a new row to the table with the given currency conversion information.
  @param {number} quantity - The quantity of the source currency to be converted.
  @param {string} sourceCurrency - The source currency code to be converted.
  @param {string} targetCurrency - The target currency code to convert to.
  @param {number} amountConverted - The converted amount in the target currency.
  @param {string} creationDate - The date and time the conversion was made.
*/
function addRow(quantity, sourceCurrency, targetCurrency, amountConverted, creationDate) 
{
    var row = "<tr><td>" + 
        quantity + "</td><td>" + 
        sourceCurrency + "</td><td>" + 
        targetCurrency + "</td><td>" + 
        amountConverted + "</td><td>" + 
        creationDate + "</td></tr>";

    $("table tbody").append(row);
}