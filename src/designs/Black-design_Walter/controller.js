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

function printCV()
{
  window.print()
}

function toggleLanguage()
{
  const langBtn = document.getElementById('langBtn')
  
  if( langBtn.classList.contains('lang-en'))
  {
    translate('de')
    
    langBtn.classList.remove('lang-en')
    langBtn.classList.add('lang-de')
    langBtn.querySelector('img').src = 'https://flagcdn.com/w20/de.png'
  }
  else
  {
    translate('en')
    
    langBtn.classList.remove('lang-de')
    langBtn.classList.add('lang-en')
    langBtn.querySelector('img').src = 'https://flagcdn.com/w20/us.png'
  }
}
