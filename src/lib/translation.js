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
  transl('captions', 'caption', lang)
  transl('data', 'key', lang)
}

/*

Modify texts for single values or list of values

*/
function transl(vars, attr, lang)
{
  // Single elems

  // let elems = document.querySelectorAll(`[data-${attr}]`)
  let elems = document.querySelectorAll(`[data-${attr}]:not([data-list] [data-${attr}])`)
  // elems = document.querySelectorAll(`[data-${attr}]`).filter( elem => {
  //   return ! elem.closest('[data-list]')
  // })

  elems.forEach( elem => { translSetString(elem, vars, attr, lang) })

  // Lists

  elems = document.querySelectorAll('[data-list]')

  elems.forEach( elem => {
    elem.querySelectorAll(`[data-${attr}]`).forEach( elem => { translSetString(elem, vars, attr, lang) })
  })
}

function translSetString(elem, vars, attr, lang)
{
  let value

  if( vars === 'captions')
    value = captions[lang]
  else if( vars === 'data')
    value = data[lang]

  const key = elem.getAttribute(`data-${attr}`).split('.')

  key.forEach( sub => {
    value = value[sub]
  })
  if( value )
    elem.innerHTML = value
}
