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
  transl('captions', lang)
  transl('data', lang)
}

/*

Modify texts for single values or list of values

*/
function transl(name, lang)
{
  // Single elems

  // let elems = document.querySelectorAll(`[data-${name}]`)
  let elems = document.querySelectorAll(`[data-${name}]:not([data-list] [data-${name}])`)
  // elems = document.querySelectorAll(`[data-${name}]`).filter( elem => {
  //   return ! elem.closest('[data-list]')
  // })

  elems.forEach( elem => { translSetString(elem, name, lang) })

  // Lists

  elems = document.querySelectorAll('[data-list]')

  elems.forEach( elem => {
    elem.querySelectorAll(`[data-${name}]`).forEach( elem => { translSetString(elem, name, lang) })
  })
}

function translSetString(elem, name, lang)
{
  const key   = elem.getAttribute(`data-${name}`).split('.')
  let   value = window[name][lang]
  key.forEach( sub => {
    value = value[sub]
  })
  if( value )
    elem.innerHTML = value
}
