document.querySelectorAll('.collapsible').forEach( elem => {

  // const more = {'en': "Read more ...", 'de': "Mehr ..." }
  // const less = {'en': 'less', 'de': "weniger zeigen" }

  elem.addEventListener('click', function() {

    const btn = elem.querySelector('.more-btn')
    const content = elem.querySelector('.content')

    if( content.classList.contains('collapsed'))
    {
      content.classList.remove('collapsed')
      // readMore.textContent = readMore.closest('.collapsible').dataset.less
      // btn.textContent = less[ document.documentElement.lang ]
      btn.dataset.caption = 'less'
      btn.textContent = captions[ document.documentElement.lang ]['less']  // TASK: depends on captions, improve
    }
    else
    {
      content.classList.add('collapsed')
      // readMore.textContent = readMore.closest('.collapsible').dataset.more
      // btn.textContent = more[ document.documentElement.lang ]
      btn.dataset.caption = 'readMore'
      btn.textContent = captions[ document.documentElement.lang ]['readMore']
    }
  })
})
