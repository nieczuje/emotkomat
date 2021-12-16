
let boxNo;
let pin = [];
let info;
const doors = document.querySelectorAll(".door");

let userPin;
let userEmoji;
let userBox;


$(document).ready(function(){

    function closeDoors() {
        for (let i = 0; i < doors.length; ++i) {
            doors[i].classList.remove("doorOpen");
        }
    }

    function toggleDoor() {
        closeDoors();
        this.classList.toggle("doorOpen");
        boxNo = $(this).html();
    }

    function initiate() {
        for (let i = 0; i < doors.length; i++) {
            doors[i].innerHTML = i + 1;
            if (!peb) {
                doors[i].addEventListener("click", toggleDoor);
            }
        }

        if (peb) {
            info = "Podaj PIN: ";
            let pebLink = peb.toString().replace(/p1L2u3S/g, '+' ).replace(/s1L2a3S4h/g, '/').replace(/e1Q2u3A4l/g, '=');
            let decrypted = CryptoJS.Rabbit.decrypt(pebLink, "jiemo"); // not a secret
            let result = CryptoJS.enc.Utf8.stringify(decrypted);
            result = result.split(" ");
            userPin = result[0];
            userEmoji = result[1];
            userBox = result[2];
        } else {
            info = "Ustal PIN: ";
        }
    }

    function keybaord(){

        $(".buttons .digit").on('click', function() {
            let num = $(this).attr('value');

            if (pin.length == 4) {
                //pass
            } else {
                pin.push(num)
                $("#screen").html(info + pinScreen(pin))
            }
        });

        $("#backspace").on('click', function() {
            // disactivate button
            if ($("#screen").html() == "Emotka odebrana!") {
                return;
            }

            pin.pop()
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

        $("#btn-copy").on('click', function() {
            /* Get the text field */
            const copyText = document.getElementById("export-copy");

            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyText.textContent);

            $("#btn-copied").css('visibility', 'visible');
            $("#btn-copied-short").css('visibility', 'hidden');
        });

        $("#btn-copy-short").on('click', function() {
            /* Get the text field */
            const copyText = document.getElementById("export-copy-short");

            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyText.textContent);

            $("#btn-copied-short").css('visibility', 'visible');
            $("#btn-copied").css('visibility', 'hidden');
        });

        $("#enter").on('click', function() {
            if (peb) {
                if (validateReceive()) {
                    // emoji
                    let emojis = userEmoji.split("-");
                    let emojisHtml = ""
                    for (let j = 0; j < emojis.length; ++j) {
                        let emojiReady = "&#x" + emojis[j] + ";";
                        emojisHtml += emojiReady;
                    }

                    let changeButtons = document.getElementsByClassName('chat-input-tool');
                    let boxEmojis = document.getElementsByClassName('test-emoji');
                    for (let i = 0; i < doors.length; ++i) {
                        if (userBox == i + 1) {
                            doors[i].classList.add("doorOpen");
                        }
                        changeButtons[i].classList.add("chat-input-tool-receive");
                        $(boxEmojis[i]).html(emojisHtml);

                    $("#screen").html("Emotka odebrana!");
                    }
                }
            } else {
                let emoji = $(".test-emoji").html();
                let hex = "";
                if (emoji.length <= 2) {
                    hex = emoji.codePointAt(0).toString(16)
                } else {
                    for (let i = 0; i < emoji.length; i++) {
                        let candidate = emoji.codePointAt(i).toString(16)
                        if (!isNaN(candidate[0]) || candidate[0] == "f" ) {
                            hex = hex + candidate + "-";
                        }
                    }
                    hex = hex.slice(0, -1);
                }
                // hex = String.fromCodePoint("0x"+hex);

                if (validate()) {
                    pinString = pin.join("")
                    let uri = pinString + " " + hex + " " + boxNo

                    // encrypt
                    let encrypted = CryptoJS.Rabbit.encrypt(uri, "jiemo");
                    let encryptedLink = encrypted.toString().replace(/\+/g,'p1L2u3S').replace(/\//g,'s1L2a3S4h').replace(/=/g,'e1Q2u3A4l');

                    encrypted = encryptedLink.toString().replace(/p1L2u3S/g, '+' ).replace(/s1L2a3S4h/g, '/').replace(/e1Q2u3A4l/g, '=');
                    // let decrypted = CryptoJS.Rabbit.decrypt(encrypted, "jiemo");

                    closeDoors()

                    // modal
                    $("#modal-text").text(pinString);
                    $("#modal-link").text(encryptedLink);
                    $("#modal-link-short").text(encryptedLink);

                    $("#problem-link").attr("href", $("#problem-link").text());
                    $("#problem-link2").attr("href", $("#problem-link2").text());

                    setTimeout(function() {
                        modal.style.display = "block";
                    }, 1000);
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
            return true;
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
            return true;
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

    initiate();
    keybaord();
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
    let query = this.value;
    if(query != ""){
        $(".intercom-emoji-picker-emoji:not([title*='"+query+"'])").hide();
    }
    else{
        $(".intercom-emoji-picker-emoji").show();
    }
});


// MODAL

// Get the modal
let modal = document.getElementById("myModal");

// Get the <span> element that closes the modal
let span = document.getElementsByClassName("close")[0];

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


