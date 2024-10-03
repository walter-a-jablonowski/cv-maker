
Did you use landscape in the print version? Try to fit it in portrait so that it till looks nice. And assume that the page has no borders on print.

--

Can you add a vertical line before each entry in Experience and Education that looks like a timeline? Please only print the changed lines and indent all codes with 2 spaces.

--

Make a stunning web developer logo based on `</>`. Be creative, make it great looking.
Use black and orange as accent color, make just the logo no background.

--

Make a PHP resume generator that takes yml and makes an html resume for a developer in a nice design. PHP generates a static html page from yml.

- Personal data
  - name
  - image
  - summary
  - email
  - url
  - location
    - address
    - postalCode
    - city
  - date of birth
  - nationality
  - marital status
- Summary: full text summary that I provide
- Skills: List of programming languages with progress bar as well as language skills (with no progress bar)
- Special skills: full text summary that I provide
- Experience: list companies that I worked for with typical fields
  - from
  - until
  - organisation
  - position
- Education
  - from
  - until
  - institution
  - summary

I would like to be able to print the resume as well as use it as webpage. Be sure that it's looking good in all versions.

Use Symfony yml parser and indent all codes with 2 spaces. Please put the html in a seperate file and call it from the generator with require using ob_get_clean(). In html use PHP's alternative syntax for loops and conditions and insert data with tags like <?= ... ?>
