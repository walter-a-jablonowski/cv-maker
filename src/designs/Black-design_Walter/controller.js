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
    
    document.documentElement.lang = 'de'
    langBtn.classList.remove('lang-en')
    langBtn.classList.add('lang-de')
    langBtn.querySelector('img').src = 'https://flagcdn.com/w20/de.png'
  }
  else
  {
    translate('en')
    
    document.documentElement.lang = 'en'
    langBtn.classList.remove('lang-de')
    langBtn.classList.add('lang-en')
    langBtn.querySelector('img').src = 'https://flagcdn.com/w20/us.png'
  }
}

const content  = document.getElementById('content')
const readMore = document.getElementById('readMore')

readMore.addEventListener('click', function() {
  
  if( content.classList.contains('collapsed'))
  {
    content.classList.remove('collapsed')
    // readMore.textContent = 'Less'
    readMore.textContent = readMore.closest('.collapsible').dataset.less
  }
  else {
    content.classList.add('collapsed')
    // readMore.textContent = 'Read more ...'
    readMore.textContent = readMore.closest('.collapsible').dataset.more
  }
})
