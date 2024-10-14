

- [x] Shorten the mail
- [x] new QR code
- [x] left over: read more, qr
- [ ] maybe add some AI generated toast that tells the user to set print paddings to 0
- [ ] move commonly used code from designs


Page height in print
----------------------------------------------------------

Make sidebar fully black h 100 in print layout, current solution:

```
.sidebar {
  min-height: calc(59.4cm - 2rem);  /* current solution: page 2 * A4 high - padding */
}
```

AI's solution for dynamic sidebar height (as long as x * A4 pages, depends on main content lenght)

- remove the style above

```javascript

// .dynamic-height {
//   height: 100%;
// }

function adjustSidebarHeight()
{
  const sidebar = document.querySelector('.sidebar');
  const mainContent = document.querySelector('.main-content');
  
  sidebar.style.height = 'auto';
  
  const sidebarHeight = sidebar.offsetHeight;
  const mainContentHeight = mainContent.offsetHeight;
  
  if( mainContentHeight > sidebarHeight)
    sidebar.style.height = mainContentHeight + 'px';
}

window.addEventListener('load', adjustSidebarHeight);
window.addEventListener('beforeprint', adjustSidebarHeight);
window.addEventListener('resize', adjustSidebarHeight);
```
