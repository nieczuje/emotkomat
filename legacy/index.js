var boxNo = undefined;
var pin = [];
var exportString = "123456";

function toggleDoor() {
  var cusid_ele = document.getElementsByClassName('door');
  for (var i = 0; i < cusid_ele.length; ++i) {
      var item = cusid_ele[i];
    item.classList.remove("doorOpen");
  }
    this.classList.toggle("doorOpen");
    boxNo = $(this).html()
}

function myFunction() {
  var x, i;
  x = document.querySelectorAll(".door");
  for (i = 0; i < x.length; i++) {
    x[i].addEventListener("click", toggleDoor);
    x[i].innerHTML = i + 1;
  }
}

$(document).ready(function(){

  function calculator(){
    var info = "Ustal PIN:";
    var sum = "";
    var len;
    var operators = ["+", "-", "*", "/"];
    var inputVal = document.getElementById("screen");

    $(".buttons .digit").on('click', function() {
      var num = $(this).attr('value');
      sum += num;
    len = inputVal.innerHTML.split("");
    console.log(len);
    console.log(pin.length)
    if (pin.length == 4) {
        //pass
    } else {
        pin.push(num)
        $("#screen").html(info + pinScreen(pin))
    }
    console.log(pin)
    console.log(pinScreen(pin))

    });

    $("#equal").on('click', function() {
        var total =  eval(sum);
        pin.pop()
        console.log(pin)
        currentScreen = document.getElementById("screen").innerHTML;
        $("#screen").html(info + pinScreen(pin))
    });

    $("#clear").on('click', function() {
        sum = "";
        arr = [];
        pin = [];
        $("#screen").html(info + "****");
    });

    $(".btn-copy").on('click', function() {
        /* Get the text field */
        var copyText = document.getElementById("export-copy");

        /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText.textContent);

        $("#btn-copied").css('visibility', 'visible');
        $("#btn-copied2").css('visibility', 'hidden');
    });

    $(".btn-copy2").on('click', function() {
        /* Get the text field */
        var copyText = document.getElementById("export-copy2");

        /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText.textContent);

        $("#btn-copied2").css('visibility', 'visible');
        $("#btn-copied").css('visibility', 'hidden');
    });

    $("#enter").on('click', function() {
      var emoji = $(".test-emoji").html();
      let hex = emoji.codePointAt(0).toString(16)

      if (validate()) {
        pinString = pin.join("")
        console.log(pinString, hex, boxNo)

        // close door
        var cusid_ele = document.getElementsByClassName('door');
        for (var i = 0; i < cusid_ele.length; ++i) {
            var item = cusid_ele[i];
          item.classList.remove("doorOpen");
        }

        // modal
        $("#modal-text").text(pinString);
        $("#modal-link").text(hex + hex + hex + hex);
        $("#modal-link2").text(hex + hex + hex + hex);

        setTimeout(function() {
            modal.style.display = "block";
        }, 1000);
      }
    });

    };
          calculator();
});

function validate() {
    if( pin.length != 4 ) {
      alert( "Ustal 4-cyfrowy PIN!" );
      return false;
    }
    if( boxNo == undefined ) {
      alert( "Wybierz skrytkę!" );
      return false;
    }
    return( true );
}

function pinScreen(pin) {
    pinString = pin.join("");
    if (pin.length == 1) {
        pinString += "***";
    } else if (pin.length == 2) {
        pinString += "**";
    } else if (pin.length == 3) {
        pinString += "*";
    } else if (pin.length == 4) {
        //pass
    } else {
        pinString += "****";
    }
  return pinString;
}


// EMOJI

$(document).on("click","#emoji-picker",function(e){
   e.stopPropagation();
    $('.intercom-composer-emoji-popover').toggleClass("active");
});

$(document).click(function (e) {
    if ($(e.target).attr('class') != '.intercom-composer-emoji-popover' && $(e.target).parents(".intercom-composer-emoji-popover").length == 0) {
        $(".intercom-composer-emoji-popover").removeClass("active");
    }
});

// remove last emoji
$(document).on("click",".intercom-emoji-picker-emoji",function(e){
    $(".test-emoji").empty();
});

$(document).on("click",".intercom-emoji-picker-emoji",function(e){
    $(".test-emoji").append($(this).html());
});

$('.intercom-composer-popover-input').on('input', function() {
    var query = this.value;
    if(query != ""){
      $(".intercom-emoji-picker-emoji:not([title*='"+query+"'])").hide();
    }
    else{
      $(".intercom-emoji-picker-emoji").show();
    }
});


// MODAL

// Get the modal
var modal = document.getElementById("myModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
