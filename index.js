
var boxNo = undefined;
var pin = [];

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

function myFunctionReceive() {
    var x, i;
    x = document.querySelectorAll(".door");
    for (i = 0; i < x.length; i++) {
      x[i].innerHTML = i + 1;
    }
}

$(document).ready(function(){

    function calculator(){
        if (peb) {
            var info = "Podaj PIN: ";
        } else {
            var info = "Ustal PIN: ";
        }

        $(".buttons .digit").on('click', function() {
            var num = $(this).attr('value');

            if (pin.length == 4) {
                //pass
            } else {
                pin.push(num)
                $("#screen").html(info + pinScreen(pin))
            }
        });

        $("#equal").on('click', function() {
            // disactivate button
            if ($("#screen").html() == "Emotka odebrana!") {
                return;
            }

            pin.pop()
            currentScreen = document.getElementById("screen").innerHTML;
            $("#screen").html(info + pinScreen(pin))
        });

        $("#clear").on('click', function() {
            // disactivate button
            if ($("#screen").html() == "Emotka odebrana!") {
                return;
            }

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
            let hex = "";
            if (emoji.length <= 2) {
                hex = emoji.codePointAt(0).toString(16)
            } else {
                for (let i = 0; i < emoji.length; i++) {
                    candidate = emoji.codePointAt(i).toString(16)
                    if (!isNaN(candidate[0]) || candidate[0] == "f" ) {
                        hex = hex + candidate + "-";
                    }
                }
                hex = hex.slice(0, -1);
            }
            // hex = String.fromCodePoint("0x"+hex);

            if (validate()) {
                pinString = pin.join("")
                var uri = pinString + " " + hex + " " + boxNo

                // encrypt
                var encrypted = CryptoJS.Rabbit.encrypt(uri, "jiemo");
                var encrypted_link = encrypted.toString().replace(/\+/g,'p1L2u3S').replace(/\//g,'s1L2a3S4h').replace(/=/g,'e1Q2u3A4l');

                encrypted = encrypted_link.toString().replace(/p1L2u3S/g, '+' ).replace(/s1L2a3S4h/g, '/').replace(/e1Q2u3A4l/g, '=');
                var decrypted = CryptoJS.Rabbit.decrypt(encrypted, "jiemo");

                // close door
                var cusid_ele = document.getElementsByClassName('door');
                for (var i = 0; i < cusid_ele.length; ++i) {
                    var item = cusid_ele[i];  
                    item.classList.remove("doorOpen");
                }

                // modal
                $("#modal-text").text(pinString);
                $("#modal-link").text(encrypted_link);
                $("#modal-link2").text(encrypted_link);

                // $("#problem-link").text($(this).attr("href"))
                $("#problem-link").attr("href", $("#problem-link").text());
                $("#problem-link2").attr("href", $("#problem-link2").text());

                setTimeout(function() {
                    modal.style.display = "block";
                }, 1000);
            }
        });

        $("#enter-receive").on('click', function() {
            if (validateReceive()) {
                pinString = pin.join("")

                // close door
                var cusid_ele = document.getElementsByClassName('door');
                var cusid_change = document.getElementsByClassName('chat-input-tool');
                var cusid_emoji = document.getElementsByClassName('test-emoji');
                for (var i = 0; i < cusid_ele.length; ++i) {
                    var item = cusid_ele[i];
                    if (userBox == i + 1) {
                      item.classList.add("doorOpen");
                    }

                    var item2 = cusid_change[i];
                    item2.classList.add("chat-input-tool-receive");

                    // emoji
                    var emojis = userEmoji.split("-");
                    var emojis_html = ""
                    for (var j = 0; j < emojis.length; ++j) {
                        var emoji_ready = "&#x" + emojis[j] + ";";
                        emojis_html += emoji_ready;
                    }

                    var item3 = cusid_emoji[i];
                    $(item3).html(emojis_html);

                $("#screen").html("Emotka odebrana!");
                }
            }
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

        function validateReceive() {
            if( pin.length != 4 ) {
                alert( "Podaj 4-cyfrowy PIN!" );
                return false;
            }
            if( pin.join("") != userPin ) {
                alert( "Błędny PIN!");
                pin = [];
                $("#screen").html(info + "****");
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
    };

    calculator();
});


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


