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

function translate(lang)
{
/*
  // let elems = document.querySelectorAll('[data-caption]')
  let elems = document.querySelectorAll('[data-caption]:not([data-list] [data-caption])')

  elems.forEach( elem => {
    const key = elem.getAttribute('data-caption')
    if( captions[lang][key])
      elem.textContent = captions[lang][key]
  })
  
  // elems = document.querySelectorAll('[data-key]')
  elems = document.querySelectorAll('[data-key]:not([data-list] [data-key])')

  elems.forEach( elem => {
    const key   = elem.getAttribute('data-key').split('.')
    let   value = data[lang]
    key.forEach( sub => {
      value = value[sub]
    })
    if( value )
      elem.innerHTML = value
  })
*/
  valsAndlists('captions', lang)
  valsAndlists('data', lang)
}

function valsAndlists(name, lang)
{
  // Single elems

  // let elems = document.querySelectorAll(`[data-${name}]`)
  let elems = document.querySelectorAll(`[data-${name}]:not([data-list] [data-${name}])`)
  // elems = document.querySelectorAll(`[data-${name}]`).filter( elem => {
  //   return ! elem.closest('[data-list]')
  // })

  elems.forEach( elem => { setString(elem, name, lang) })

  // Lists

  elems = document.querySelectorAll('[data-list]')

  elems.forEach( elem => {
    elem.querySelectorAll(`[data-${name}]`).forEach( elem => { setString(elem, name, lang) })
  })

function setString(elem, name, lang)
{
  const key   = elem.getAttribute(`data-${name}`).split('.')
  let   value = window[name][lang]
  key.forEach( sub => {
    value = value[sub]
  })
  if( value )
    elem.innerHTML = value
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
