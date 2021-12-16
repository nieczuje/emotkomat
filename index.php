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

      <link rel="apple-touch-icon" sizes="180x180" href="/favicon_io/apple-touch-icon.png">
      <link rel="icon" type="image/png" sizes="32x32" href="/favicon_io/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="16x16" href="/favicon_io/favicon-16x16.png">
      <link rel="manifest" href="/favicon_io/site.webmanifest">

      <link rel="stylesheet" href="style.css" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js" integrity="sha256-/H4YS+7aYb9kJ5OKhFYPUjSJdrtV6AeyJOtTkw6X72o=" crossorigin="anonymous"></script> -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
      <!-- <script src="//cdn.jsdelivr.net/npm/simple-crypto-js@2.5.0/dist/SimpleCrypto.min.js"></script> -->

      <script>
      let peb = "<?php echo htmlspecialchars($_GET["peb"] ?? null) ?>";
      </script>
  </head>

  <body>
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
            <div class="modal-copy">
              <p id="export-copy" class="export-link">Emotka czeka na Ciebie w Emotkomacie odbiorczym! Wejdz w link, podaj PIN i naciśnij "ODBIERZ". <strong><br> PIN: <span id="modal-text"></span></strong><br><span> </span
                ><a id="problem-link" href="#" target="_blank"
                  >https://www.emotkomat.pl/index.php?peb=<span
                    id="modal-link"
                  ></span
                ></a><span> </span
                ></p>
            </div>
            <button id="btn-copy" class="btns-copy">kopiuj</button>
            <p id="btn-copied" class="btns-copied"><em>skopiowano</em></p>
          </div>
          <br />
          <div class="modal-meesage">
            <p>Lub skopiuj sam link - nie zapomnij o PINie!</p>
            <div class="modal-copy">
              <p id="export-copy-short" class="export-link"><a id="problem-link2" href="#" target="_blank"
                  >https://www.emotkomat.pl/index.php?peb=<span
                    id="modal-link-short"
                  ></span
                ></a></p>
            </div>
            <button id="btn-copy-short" class="btns-copy">kopiuj</button>
            <p id="btn-copied-short" class="btns-copied"><em>skopiowano</em></p>
          </div>
        </div>
        <div class="modal-footer">
          <div>
            emotkomat.pl
          </div>
        </div>
      </div>
    </div>

    <div id="drawing" class="<?php
        if(isset($_GET["peb"])) {
            echo 'drawing-bg-receive';
        } else {
            echo 'drawing-bg';
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
            <!-- <div id="title-sending">
              <span class="button send-inactive">emotkomat nadawczy</span>
            </div>
            <div id="title-receiving">
              <a href="index.php" class="button send">emotkomat nadawczy</a>
              <span class="button">emotkomat odbiorczy</span>
            </div> -->
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
                  <button class="black-button" id="backspace" value="">
                    &larr;
                  </button>

                  <button class="black-button submit <?php
                    if(isset($_GET["peb"])) {
                        echo 'submit-receive';
                    }
                    ?>" id="enter">
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
