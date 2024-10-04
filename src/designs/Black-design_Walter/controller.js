/*
function adjustFontSize()
{
  const container = document.querySelector('#name')
  const text = document.querySelector('.inner-name')
  let fontSize = 40
  text.style.fontSize = fontSize + 'px'

  while( text.scrollWidth > container.clientWidth && fontSize > 8)
  {
    fontSize--
    text.style.fontSize = fontSize + 'px'
  }
}

window.addEventListener('load',   adjustFontSize)
window.addEventListener('resize', adjustFontSize)
*/

function toggleLanguage() {
  const langBtn = document.getElementById('langBtn');
  if (langBtn.classList.contains('lang-en')) {
    langBtn.classList.remove('lang-en');
    langBtn.classList.add('lang-de');
    langBtn.title = "Switch to English";
  } else {
    langBtn.classList.remove('lang-de');
    langBtn.classList.add('lang-en');
    langBtn.title = "Switch to German";
  }
  // Here you would add logic to actually change the language of the page
}
