
// var element = document.querySelector(".door");
// element.addEventListener("click", toggleDoor);

// function toggleDoor() {
//   element.classList.toggle("doorOpen");
// }

function toggleDoor() {
  var cusid_ele = document.getElementsByClassName('door');
for (var i = 0; i < cusid_ele.length; ++i) {
    var item = cusid_ele[i];  
    // item.innerHTML = 'this is value' + i;
  item.classList.remove("doorOpen");
}
  this.classList.toggle("doorOpen");
}

function myFunction() {
  var x, i;
  x = document.querySelectorAll(".door");
  for (i = 0; i < x.length; i++) {
    // x[i].style.backgroundColor = "blue";
    x[i].addEventListener("click", toggleDoor);
    x[i].innerHTML = i + 1;
  }
}

$(document).ready(function(){

  function calculator(){
    var info = "Ustal PIN: ";
    var sum = "";
    var len;
    var pin = [];
    //var arr= [];
    var operators = ["+", "-", "*", "/"];
    var inputVal = document.getElementById("screen");

    $(".buttons .digit").on('click', function() {
      var num = $(this).attr('value');
      sum += num;
      //arr.push(num);
    //   $("#screen").html(info + sum);
    len = inputVal.innerHTML.split("");
    console.log(len);
    // pin.push(num)
    console.log(pin.length)
    //console.log(arr);
    if (pin.length == 4) {
        //pass
    } else {
        pin.push(num)
        $("#screen").html(info + pinScreen(pin))
    }
    console.log(pin)
    console.log(pinScreen(pin))

    });
    // $(".buttons .operator").on('click', function(e) {
    //   e.preventDefault();
    //   var ops = $(this).attr('value');
    //   sum += ops;
    //   //arr.push(num);
    //   $("#screen").html(sum);
    //    len = inputVal.innerHTML;
    //   if(/(?=(\D{2}))/g.test(sum)) {
    //     sum = len.substring(0, len.length - 1);
    //     $("#screen").html(sum);
    //   }
    //   //len = inputVal.innerHTML.split("");
    //     //console.log(len);
        
    //   //console.log(arr);

    // });


    $("#equal").on('click', function() {
        var total =  eval(sum);
        //$("#screen").attr('value', total);
        // $("#screen").html(total % 1 != 0 ? total.toFixed(2) : total);
        pin.pop()
        console.log(pin)
        currentScreen = document.getElementById("screen").innerHTML;
        // $("#screen").html(info + pin);
        $("#screen").html(info + pinScreen(pin))
    });

    $("#clear").on('click', function() {
        sum = "";
        arr = [];
        pin = [];
        $("#screen").html(info + "****");
    });

    $("#enter").on('click', function() {
      var emoji = $(".test-emoji").html();
      let hex = emoji.codePointAt(0).toString(16)
      // let emo = String.fromCodePoint("0x"+hex);
      console.log(hex)
      alert(hex);
    });

    };
          calculator();
});

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

// $(document).on("click",".chat-input-tool",function(e){
//    e.stopPropagation();
//   //  var myClass = this.className;
//    var myClass = $(this).parent();
//    alert(JSON.stringify(myClass));
//     $('.intercom-composer-emoji-popover').toggleClass("active");
// });



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


