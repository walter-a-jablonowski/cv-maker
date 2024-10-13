document.querySelectorAll('.collapsible').forEach( elem => {

  // const more = {'en': "Read more ...", 'de': "Mehr ..." }
  // const less = {'en': 'less', 'de': "weniger zeigen" }

  elem.addEventListener('click', function() {

    const btn = elem.querySelector('.more-btn')
    const content = elem.querySelector('.content')
    const lang = document.documentElement.lang

    if( content.classList.contains('collapsed'))
    {
      content.classList.remove('collapsed')
      btn.dataset.caption = 'collapsible.less'
      // btn.textContent = less[ document.documentElement.lang ]
      btn.textContent = JSON.parse( btn.closest('.collapsible').dataset.captions)[lang].less
    }
    else
    {
      content.classList.add('collapsed')
      btn.dataset.caption = 'collapsible.readMore'
      // btn.textContent = more[ document.documentElement.lang ]
      btn.textContent = JSON.parse( btn.closest('.collapsible').dataset.captions)[lang].readMore
    }
  })
})
