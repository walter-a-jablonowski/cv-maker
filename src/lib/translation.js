function translate( lang )
{
  // Captions
  
  document.querySelectorAll(`[data-caption]`).forEach( elem => {
    // we don't really need list captions, just replace the strings
    elem.innerHTML = captions[lang][elem.dataset.caption]
  })

  // Single data values

  let elems = document.querySelectorAll(`[data-key]:not([data-list] [data-key])`)  // TASK: (advanced) recurse (see also below) :not([data-list] [data-list]
  // elems = document.querySelectorAll(`[data-key]`).filter( elem => {
  //   return ! elem.closest('[data-list]')
  // })

  elems.forEach( elem => { 
    elem.innerHTML = findKey( data[lang], elem.dataset.key)
  })
  
  // Data lists

  let lists = document.querySelectorAll('[data-list]')

  lists.forEach( list => { translate_recurse( list, lang ) })
}

function translate_recurse( list, lang )
{
  if( list.dataset.list === 'skills.lang')
    console.log('debug')

  let value = findKey( data[lang], list.dataset.list )  // TASK: func has undefined (currently makes no difference)
  
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
