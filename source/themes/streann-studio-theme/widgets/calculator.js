document.addEventListener("DOMContentLoaded", function () {
  let rangeInputs = document.querySelectorAll("input[type=range]"),
    subscription = document.getElementById("subscription"),
    minutes = document.getElementById("course_event"),
    inputNumbers = document.querySelectorAll(".calculator-input-number");

  inputNumbers.forEach((input) => {
    input.addEventListener("input", function () {
      this.value = this.value.replace(/\D/g, "");
    });
  });

  subscription.addEventListener("input", function () {
    minutes.value = "";
    calculatePrice();
  });

  subscription.addEventListener("change", function () {
    minutes.value = "";
    calculatePrice();
  });

  minutes.addEventListener("input", function () {
    subscription.value = "";
    calculatePrice();
  });

  minutes.addEventListener("change", function () {
    subscription.value = "";
    calculatePrice();
  });

  rangeInputs.forEach(function (input) {
    updateRangeValue(input);
    input.addEventListener("input", function () {
      updateRangeValue(input);
    });
    input.addEventListener("change", function () {
      updateRangeValue(input);
    });
  });
});

function getRangeGradient(color1, color2, value, maximum) {
  var gradient = "linear-gradient(to right, ";
  var breakPoint = (value / maximum) * 100;
  var attrValue =
    gradient +
    color1 +
    " 0%, " +
    color1 +
    " " +
    breakPoint +
    "%, " +
    color2 +
    " " +
    breakPoint +
    "%, " +
    color2 +
    " 100%)";
  return attrValue;
}

function updateRangeValue(input) {
  var selectedColor = "#1AABEC";
  var nonSelectedColor = "#ddd";
  var value = input.value;
  var maximum = input.max;
  var inputWidth = input.offsetWidth; // adjust from jQuery's width() to Vanilla JS
  var background = getRangeGradient(
    selectedColor,
    nonSelectedColor,
    value,
    maximum
  );
  var offLeft = Math.floor(
    (value / maximum) * inputWidth -
      (((value / maximum) * inputWidth - inputWidth / 2) / 100) * 24
  );
  var offLeftAbs =
    value == maximum
      ? input.getBoundingClientRect().left - 15 + offLeft
      : input.getBoundingClientRect().left - 10 + offLeft;

  var textElement = input.nextElementSibling; // get the next sibling element
  if (textElement && textElement.classList.contains("range-value")) {
    textElement.style.left = offLeftAbs + "px";
    textElement.innerHTML = numberWithCommas(value) + " Members";
  }

  input.style.background = background;
  calculatePrice();
}

function numberWithCommas(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function calculatePrice() {
  var subscribers = document.getElementById("numberMember").value
    ? document.getElementById("numberMember").value
    : 0;
  var fee = document.getElementById("subscription").value
    ? document.getElementById("subscription").value
    : 0;
  var minutes = document.getElementById("course_event").value
    ? document.getElementById("course_event").value
    : 0;
  if (fee == 0) {
    var totalPrice = parseInt(subscribers) * parseInt(minutes);
    document.getElementById("subscription").value = "";
  } else {
    var totalPrice = parseInt(subscribers) * parseInt(fee) * 12;
    document.getElementById("course_event").value = "";
  }

  document.getElementById("calcResult").innerHTML =
    "$" + numberWithCommas(totalPrice.toFixed(0));
}
