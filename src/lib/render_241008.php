<?php

// same as inc() be able use class context via $this

/*@

inc

- must be non static

**included fil**

```php
extract($args);

$return['done'] = [];
```

*/
function render( string $INC_VIEW, $args = null, &$return = null ) /*@*/
{
  ob_start();                   // alternative: $s = require()
  require($INC_VIEW);
  $INC_STR_R = ob_get_clean();  // var has unusual name

  return $INC_STR_R;
}

?>
