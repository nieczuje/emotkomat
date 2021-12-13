<!-- <?php
echo "Software used:";
?> -->
<!-- <?php include 'software.php';?> -->

<!DOCTYPE html>
<html lang="en">
  <!-- <head> -->
      <meta charset="UTF-8" />
      <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" /> -->
      <meta http-equiv="X-UA-Compatible" content="ie=edge" />
      <title>Emotkomat</title>
      <link rel="stylesheet" href="style.css" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js" integrity="sha256-/H4YS+7aYb9kJ5OKhFYPUjSJdrtV6AeyJOtTkw6X72o=" crossorigin="anonymous"></script> -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
      <!-- <script src="//cdn.jsdelivr.net/npm/simple-crypto-js@2.5.0/dist/SimpleCrypto.min.js"></script> -->

      <script>
      var peb = "<?php echo htmlspecialchars($_GET["peb"] ?? null) ?>";
      if (peb) {
          var peb_link = peb.toString().replace(/p1L2u3S/g, '+' ).replace(/s1L2a3S4h/g, '/').replace(/e1Q2u3A4l/g, '=');
          var decrypted = CryptoJS.Rabbit.decrypt(peb_link, "jiemo");
          var result = CryptoJS.enc.Utf8.stringify(decrypted);
          result = result.split(" ");
          var userPin = result[0];
          var userEmoji = result[1];
          var userBox = result[2];
      }
      </script>
  </head>
  <body onload="<?php
      if(isset($_GET["peb"])) {
          echo 'myFunctionReceive';
      } else {
          echo 'myFunction';
      }
      ?>()">
    <!-- The Modal -->
    <div id="myModal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-header">
          <span class="close">&times;</span>
          <h2>Twoja emotka została nadana!</h2>
        </div>
        <div class="modal-body">
          <p>
            Skopiuj poniższą wiadomość z linkiem oraz PINem i wklej znajomym,
            żeby mogli odebrać emotkę:
          </p>
          <div class="modal-meesage">
            <div id="modal-copy">
              <p id="export-copy">Emotka czeka na Ciebie w Emotkomacie odbiorczym! Wejdz w link, podaj PIN i naciśnij "ODBIERZ". <a id="problem-link" href="#" target="_blank"
                  >https://www.emotkomat.pl/index.php?peb=<span
                    id="modal-link"
                  ></span
                ></a><strong><br> PIN: <span id="modal-text"></span></strong><span> </span
                ></p>
            </div>
            <button class="btn-copy">kopiuj</button>
            <p id="btn-copied"><em>skopiowano</em></p>
          </div>
          <br />
          <div class="modal-meesage">
            <p>Lub skopiuj sam link - nie zapomnij o PINie!</p>
            <div id="modal-copy">
              <p id="export-copy2"><a id="problem-link2" href="#" target="_blank"
                  >https://www.emotkomat.pl/index.php?peb=<span
                    id="modal-link2"
                  ></span
                ></a></p>
            </div>
            <button class="btn-copy2">kopiuj</button>
            <p id="btn-copied2"><em>skopiowano</em></p>
          </div>
        </div>
        <div class="modal-footer">
          <div>
            emotkomat.pl
          </div>
        </div>
      </div>
    </div>

    <div id="<?php
        if(isset($_GET["peb"])) {
            echo 'drawing-receive';
        } else {
            echo 'drawing';
        }
        ?>">
      <div id="around">
        <div id="buttons">
          <div
            class="intercom-composer-popover intercom-composer-emoji-popover"
          >
            <div class="intercom-emoji-picker">
              <div class="intercom-composer-popover-header">
                <input
                  class="intercom-composer-popover-input"
                  placeholder="Search"
                  value=""
                />
              </div>
              <div class="intercom-composer-popover-body-container">
                <div class="intercom-composer-popover-body">
                  <?php include 'emojis.php';?>
                </div>
              </div>
            </div>
            <div class="intercom-composer-popover-caret"></div>
          </div>
          <div class="title">
          <?php
          if(isset($_GET["peb"])) {
              echo '<a href="index.php" class="button send">emotkomat nadawczy</a>';
              echo '<span class="button">emotkomat odbiorczy</span>';
          } else {
              echo '<span class="button send-inactive">emotkomat nadawczy</span>';
          }
          ?>
          </div>
        </div>
        <div id="rectangle">
          <div class="container">
            <div class="box11">
              <div class="opening">
                <div id="emoji-contener">
                  <div class="emoji-panel">
                    <button id="emoji-picker" class="chat-input-tool">
                      ZMIEŃ
                    </button>
                  </div>
                  <div class="test-emoji" contenteditable="false">😊</div>
                </div>
                <div class="door <?php
                  if(isset($_GET["peb"])) {
                      echo 'door-receive';
                  }
                  ?>"></div>
              </div>
            </div>
            <div class="box12">
              <div class="opening">
                <div id="emoji-contener">
                  <div class="emoji-panel">
                    <button id="emoji-picker" class="chat-input-tool">
                      ZMIEŃ
                    </button>
                  </div>
                  <div class="test-emoji" contenteditable="false">😊</div>
                </div>
                <div class="door <?php
                  if(isset($_GET["peb"])) {
                      echo 'door-receive';
                  }
                  ?>"></div>
              </div>
            </div>
            <div class="box13">
              <div class="opening">
                <div id="emoji-contener">
                  <div class="emoji-panel">
                    <button id="emoji-picker" class="chat-input-tool">
                      ZMIEŃ
                    </button>
                  </div>
                  <div class="test-emoji" contenteditable="false">😊</div>
                </div>
                <div class="door <?php
                  if(isset($_GET["peb"])) {
                      echo 'door-receive';
                  }
                  ?>"></div>
              </div>
            </div>
            <div class="panel">
              <div class="calc-card">
                <div id="screen" class="screen"><?php
                  if(isset($_GET["peb"])) {
                      echo 'PODAJ';
                  } else {
                      echo 'USTAL';
                  }
                  ?> PIN: ****</div>
                <div class="buttons">
                  <button class="digit black-button" value="1">1</button>
                  <button class="digit black-button" value="2">2</button>
                  <button class="digit black-button" value="3">3</button>

                  <button class="digit black-button" value="4">4</button>
                  <button class="digit black-button" value="5">5</button>
                  <button class="digit black-button" value="6">6</button>

                  <button class="digit black-button" value="7">7</button>
                  <button class="digit black-button" value="8">8</button>
                  <button class="digit black-button" value="9">9</button>

                  <button class="digit black-button" id="clear" value="">
                    C
                  </button>
                  <button class="digit black-button" value="0">0</button>
                  <button class="black-button" id="equal" value="">
                    &larr;
                  </button>

                  <button class="black-button submit <?php
                    if(isset($_GET["peb"])) {
                        echo 'submit-receive';
                    }
                    ?>" id=
                    <?php
                      if(isset($_GET["peb"])) {
                          echo '"enter-receive"';
                      } else {
                          echo "'enter'";
                      }
                      ?> 
                    >
                    <?php
                      if(isset($_GET["peb"])) {
                          echo 'odbierz';
                      } else {
                          echo 'nadaj';
                      }
                      ?>  
                  </button>
                </div>
              </div>
            </div>
            <div class="box14">
              <div class="opening">
                <div id="emoji-contener">
                  <div class="emoji-panel">
                    <button id="emoji-picker" class="chat-input-tool">
                      ZMIEŃ
                    </button>
                  </div>
                  <div class="test-emoji" contenteditable="false">😊</div>
                </div>
                <div class="door <?php
                  if(isset($_GET["peb"])) {
                      echo 'door-receive';
                  }
                  ?>"></div>
              </div>
            </div>
            <div class="box15">
              <div class="opening">
                <div id="emoji-contener">
                  <div class="emoji-panel">
                    <button id="emoji-picker" class="chat-input-tool">
                      ZMIEŃ
                    </button>
                  </div>
                  <div class="test-emoji" contenteditable="false">😊</div>
                </div>
                <div class="door <?php
                  if(isset($_GET["peb"])) {
                      echo 'door-receive';
                  }
                  ?>"></div>
              </div>
            </div>
            <div class="box16">
              <div class="opening">
                <div id="emoji-contener">
                  <div class="emoji-panel">
                    <button id="emoji-picker" class="chat-input-tool">
                      ZMIEŃ
                    </button>
                  </div>
                  <div class="test-emoji" contenteditable="false">😊</div>
                </div>
                <div class="door <?php
                  if(isset($_GET["peb"])) {
                      echo 'door-receive';
                  }
                  ?>"></div>
              </div>
            </div>
            <div class="box21">
              <div class="opening">
                <div id="emoji-contener">
                  <div class="emoji-panel">
                    <button id="emoji-picker" class="chat-input-tool">
                      ZMIEŃ
                    </button>
                  </div>
                  <div class="test-emoji" contenteditable="false">😊</div>
                </div>
                <div class="door <?php
                  if(isset($_GET["peb"])) {
                      echo 'door-receive';
                  }
                  ?>"></div>
              </div>
            </div>
            <div class="box22">
              <div class="opening">
                <div id="emoji-contener">
                  <div class="emoji-panel">
                    <button id="emoji-picker" class="chat-input-tool">
                      ZMIEŃ
                    </button>
                  </div>
                  <div class="test-emoji" contenteditable="false">😊</div>
                </div>
                <div class="door <?php
                  if(isset($_GET["peb"])) {
                      echo 'door-receive';
                  }
                  ?>"></div>
              </div>
            </div>
            <div class="box23">
              <div class="opening">
                <div id="emoji-contener">
                  <div class="emoji-panel">
                    <button id="emoji-picker" class="chat-input-tool">
                      ZMIEŃ
                    </button>
                  </div>
                  <div class="test-emoji" contenteditable="false">😊</div>
                </div>
                <div class="door <?php
                  if(isset($_GET["peb"])) {
                      echo 'door-receive';
                  }
                  ?>"></div>
              </div>
            </div>
            <div class="box24">
              <div class="opening">
                <div id="emoji-contener">
                  <div class="emoji-panel">
                    <button id="emoji-picker" class="chat-input-tool">
                      ZMIEŃ
                    </button>
                  </div>
                  <div class="test-emoji" contenteditable="false">😊</div>
                </div>
                <div class="door <?php
                  if(isset($_GET["peb"])) {
                      echo 'door-receive';
                  }
                  ?>"></div>
              </div>
            </div>
            <div class="box25">
              <div class="opening">
                <div id="emoji-contener">
                  <div class="emoji-panel">
                    <button id="emoji-picker" class="chat-input-tool">
                      ZMIEŃ
                    </button>
                  </div>
                  <div class="test-emoji" contenteditable="false">😊</div>
                </div>
                <div class="door <?php
                  if(isset($_GET["peb"])) {
                      echo 'door-receive';
                  }
                  ?>"></div>
              </div>
            </div>
            <div class="box26">
              <div class="opening">
                <div id="emoji-contener">
                  <div class="emoji-panel">
                    <button id="emoji-picker" class="chat-input-tool">
                      ZMIEŃ
                    </button>
                  </div>
                  <div class="test-emoji" contenteditable="false">😊</div>
                </div>
                <div class="door <?php
                  if(isset($_GET["peb"])) {
                      echo 'door-receive';
                  }
                  ?>"></div>
              </div>
            </div>
            <div class="box31">
              <div class="opening">
                <div id="emoji-contener">
                  <div class="emoji-panel">
                    <button id="emoji-picker" class="chat-input-tool">
                      ZMIEŃ
                    </button>
                  </div>
                  <div class="test-emoji" contenteditable="false">😊</div>
                </div>
                <div class="door <?php
                  if(isset($_GET["peb"])) {
                      echo 'door-receive';
                  }
                  ?>"></div>
              </div>
            </div>
            <div class="box32">
              <div class="opening">
                <div id="emoji-contener">
                  <div class="emoji-panel">
                    <button id="emoji-picker" class="chat-input-tool">
                      ZMIEŃ
                    </button>
                  </div>
                  <div class="test-emoji" contenteditable="false">😊</div>
                </div>
                <div class="door <?php
                  if(isset($_GET["peb"])) {
                      echo 'door-receive';
                  }
                  ?>"></div>
              </div>
            </div>
            <div class="box33">
              <div class="opening">
                <div id="emoji-contener">
                  <div class="emoji-panel">
                    <button id="emoji-picker" class="chat-input-tool">
                      ZMIEŃ
                    </button>
                  </div>
                  <div class="test-emoji" contenteditable="false">😊</div>
                </div>
                <div class="door <?php
                  if(isset($_GET["peb"])) {
                      echo 'door-receive';
                  }
                  ?>"></div>
              </div>
            </div>
            <div class="box34">
              <div class="opening">
                <div id="emoji-contener">
                  <div class="emoji-panel">
                    <button id="emoji-picker" class="chat-input-tool">
                      ZMIEŃ
                    </button>
                  </div>
                  <div class="test-emoji" contenteditable="false">😊</div>
                </div>
                <div class="door <?php
                  if(isset($_GET["peb"])) {
                      echo 'door-receive';
                  }
                  ?>"></div>
              </div>
            </div>
            <div class="box35">
              <div class="opening">
                <div id="emoji-contener">
                  <div class="emoji-panel">
                    <button id="emoji-picker" class="chat-input-tool">
                      ZMIEŃ
                    </button>
                  </div>
                  <div class="test-emoji" contenteditable="false">😊</div>
                </div>
                <div class="door <?php
                  if(isset($_GET["peb"])) {
                      echo 'door-receive';
                  }
                  ?>"></div>
              </div>
            </div>
            <div class="box36">
              <div class="opening">
                <div id="emoji-contener">
                  <div class="emoji-panel">
                    <button id="emoji-picker" class="chat-input-tool">
                      ZMIEŃ
                    </button>
                  </div>
                  <div class="test-emoji" contenteditable="false">😊</div>
                </div>
                <div class="door <?php
                  if(isset($_GET["peb"])) {
                      echo 'door-receive';
                  }
                  ?>"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer>
      &copy; Copyright
      <script>
        new Date().getFullYear() > 2017 &&
          document.write(new Date().getFullYear());
      </script>
      emotkomat.pl by&nbsp;<em><a href="http://www.47studio.pl/" target="_blank" class="studio_link">47studio</a></em>
    </footer>

    <script src="index.js"></script>
  </body>
</html>
