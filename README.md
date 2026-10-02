# Emotkomat

![Handwritten](https://img.shields.io/badge/provenance-handwritten-brightgreen)

An emoji vending machine. Pick a locker, set a PIN, and send an emoji — share the link and PIN so a friend can open the matching locker and collect it.

> Emotkomat was live at `emotkomat.pl` in 2021. The domain and hosting have since been let go; this repo preserves the project.

## How it works

- Pick a numbered locker ("skrytka")
- Choose an emoji from the picker
- Set a 4-digit PIN
- Get a shareable link + PIN — opening the link and entering the PIN unlocks the matching locker and reveals the emoji

## Structure

- Root (`index.php`, `index.js`, `style.css`, `emojis.php`) — the final, deployed version of the app
- `legacy/` — the original vanilla JS/HTML prototype this grew from (Oct–Dec 2021), kept for history. See `legacy/emotkomat.php` for an even earlier, pre-jQuery first attempt.

## Demo

| Sending (nadawczy) | Receiving (odbiorczy) |
|---|---|
| [![Emotkomat nadawczy](screenshots/2.png)](screenshots/2.png) | [![Emotkomat odbiorczy](screenshots/4.png)](screenshots/4.png) |

| [![YouTube](https://img.shields.io/badge/YouTube-Watch_full_walkthrough-red?logo=youtube)](https://youtu.be/1KLDA0Ikamk) |
|---|
| [![Watch the full walkthrough](https://img.youtube.com/vi/1KLDA0Ikamk/0.jpg)](https://youtu.be/1KLDA0Ikamk) |

## Credits

- Emoji picker UI adapted from [a CodePen by Tu Truong](https://codepen.io/lufutu/pen/gWygjW), MIT licensed. License text included in `software.php`.
- Favicon generated from [Twemoji](https://github.com/twitter/twemoji) (`1f60a.svg`), © Twitter, Inc. and contributors, CC-BY 4.0.
