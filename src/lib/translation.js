function translate(lang)
{
  transl('captions', 'caption', lang)
  transl('data', 'key', lang)
}

/*

Modify texts for single values or list of values

*/
function transl(vars, attr, lang)
{
  // Single elems

  let elems = document.querySelectorAll(`[data-${attr}]:not([data-list] [data-${attr}])`)
  // elems = document.querySelectorAll(`[data-${attr}]`).filter( elem => {
  //   return ! elem.closest('[data-list]')
  // })

  elems.forEach( elem => { translSetString(elem, vars, attr, lang) })

  // Lists

  let lists = document.querySelectorAll('[data-list]')
  let idx   = -1

  lists.forEach( list => {
    idx++
    list.querySelectorAll(`[data-${attr}]`).forEach( elem => { translSetString(elem, vars, attr, lang, idx) })
  })
}

function translSetString(elem, vars, attr, lang, idx = -1)
{
  let value

  if( vars === 'captions')
    value = captions[lang]
  else if( vars === 'data')
    value = data[lang]

  if( elem.getAttribute(`data-${attr}`) === 'company' )
    console.log('debug')

  // Select the right list entry
  // (TASK) improve this list handling a bit? at least we can have deeper nested lists

  if( idx > -1 )
  {
    let list = elem.closest('[data-list]').dataset.list
    
    if( list in value )
      value = value[list]
    
    if( Array.isArray(value) && idx < value.length)  // idx is in array = select list entry only for index lists (no captions)
      value = value[idx]
  }

  let key = elem.getAttribute(`data-${attr}`).split('.')

  key.forEach( sub => {
    value = value[sub]
  })

  if( value )
    elem.innerHTML = value
}
