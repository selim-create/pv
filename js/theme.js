$(function () {
  /* Fly To */
  $(".flyMeToMoon").click(function () {
    $("html, body").animate({ scrollTop: "0" }, 500);
  });

  /* Kredi Number */
  $("input.number").keyup(function (event) {
    // skip for arrow keys
    if (event.which >= 37 && event.which <= 40) return;

    // format number
    $(this).val(function (index, value) {
      return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    });
  });

  $("input.number").change(function (event) {
    var value = $(this).val();
    var new_value = parseInt(value.replace(".", ""));
    if (new_value < 500) {
      $(".calculatorBtn").prop("disabled", true);
      $(this).val("");
      $(this).attr("placeholder", "En az 500 TL girin");
      $(this).addClass("number-red");
    } else {
      $(".calculatorBtn").prop("disabled", false);
      $(".kredi_tutari_error").hide();
    }
  });
});

function cryptoChangeCurrency(ajax_url) {
  var currency = $(".crypto_currency_val").val();
  var default_currency = $(".default_currency").val();
  var crypto_price_BTC = $(".crypto_price_BTC").html().replace(",", ".");
  var crypto_price_ETH = $(".crypto_price_ETH").html().replace(",", ".");
  var crypto_price_EOS = $(".crypto_price_EOS").html().replace(",", ".");
  var crypto_price_XRP = $(".crypto_price_XRP").html().replace(",", ".");
  var crypto_price_BCH = $(".crypto_price_BCH").html().replace(",", ".");
  var crypto_price_LTC = $(".crypto_price_LTC").html().replace(",", ".");
  const loadingText = "Yükleniyor...";
  $(".crypto_price_BTC").html(loadingText);
  $(".crypto_price_ETH").html(loadingText);
  $(".crypto_price_EOS").html(loadingText);
  $(".crypto_price_XRP").html(loadingText);
  $(".crypto_price_BCH").html(loadingText);
  $(".crypto_price_LTC").html(loadingText);

  $.get(
    ajax_url +
      "?action=crypto_change_currency&base=" +
      default_currency.toUpperCase() +
      "&symbols=" +
      currency.toUpperCase(),
    function (data) {
      $(".default_currency").val(currency);
      var try_to_base = data;

      $(".crypto_price_BTC").html((try_to_base * crypto_price_BTC).toFixed(2));
      $(".crypto_price_ETH").html((try_to_base * crypto_price_ETH).toFixed(2));
      $(".crypto_price_EOS").html((try_to_base * crypto_price_EOS).toFixed(4));
      $(".crypto_price_XRP").html((try_to_base * crypto_price_XRP).toFixed(4));
      $(".crypto_price_BCH").html((try_to_base * crypto_price_BCH).toFixed(3));
      $(".crypto_price_LTC").html((try_to_base * crypto_price_LTC).toFixed(3));
    }
  );
}

// Doviz Toplu Hesapla
$(".currency-quantity").keyup(function () {
  var price = $(this).data("price");
  var currency_price, new_price, try_price;
  var count = $(this).val();

  if (price == 1) {
    jQuery(".currency-quantity").each(function () {
      currency_price = $(this).data("price");

      if (currency_price != price) {
        currency_price = currency_price.toString().replace(",", ".");
        new_price = count / currency_price;

        $(this).val(new_price.toFixed(4));
      }
    });
  } else {
    jQuery(".currency-quantity").each(function () {
      currency_price = $(this).data("price");

      if (currency_price != price) {
        if (currency_price == 1) {
          currency_price = price.toString().replace(",", ".");
          new_price = count * currency_price;

          $(this).val(new_price.toFixed(4));
          try_price = new_price.toFixed(4);
        } else {
          currency_price = currency_price.toString().replace(",", ".");
          new_price = try_price / currency_price;

          $(this).val(new_price.toFixed(4));
        }
      }
    });
  }
});

$(".loginControl").click(function () {
  alert("Lütfen üye girişi yapın.");
});

$("i.search").click(function () {
  $(".search-form").toggleClass("open-form");
  $(".search-form span").toggle();
});

$(".search-form span").on("click", function () {
  $(this).hide();
  $(".search-form input").focus();
});

$(".search-form input").on("keydown", function () {
  $(".search-form span").hide();
});

$(".search-form input").on("focusout", function () {
  $(".search-form span").show();
  this.value = "";
});
