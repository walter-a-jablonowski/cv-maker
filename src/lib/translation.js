function translate( lang )
{
  // Captions
  
  document.querySelectorAll(`[data-caption]`).forEach( elem => {
    // we don't really need list captions, just replace the strings
    elem.innerHTML = captions[lang][elem.dataset.caption]
  })

  // Single data values

  let elems = document.querySelectorAll(`[data-key]:not([data-list] [data-key])`)
  // elems = document.querySelectorAll(`[data-key]`).filter( elem => {
  //   return ! elem.closest('[data-list]')
  // })

  elems.forEach( elem => { 
    elem.innerHTML = data[lang][ findKey(data, elem.dataset.key) ]
  })
  
  // Data lists

  let lists = document.querySelectorAll('[data-list]')

  lists.forEach( list => { translate_recurse( list, lang ) })
}

function translate_recurse( list, lang )
{
  let value = findKey( data[lang], list.dataset.list )  // TASK: func has undefined
  
  list.querySelectorAll(`[data-idx]`).forEach( idx => {
    
    let val = value[idx.dataset.idx]

    idx.querySelectorAll(`[data-key]`).forEach( entry => {
      entry.innerHTML = findKey( val, entry.dataset.key)
    })
  })
  
  // TASK: (advanced) nestend lists

  // list.querySelectorAll(`[data-list]:not([data-list] [data-list]`).forEach( subList => {
  //   translate_recurse( subList, lang )
  // })
}

/*

function translSetString(elem, vars, attr, lang, idx = -1)
{
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
}

*/
