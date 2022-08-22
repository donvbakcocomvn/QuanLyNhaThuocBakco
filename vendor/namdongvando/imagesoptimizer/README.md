## Project Overview
## System Requirements
PHP >= 7.2
## Installation Instructions
Composer is the easiest way to manage dependencies in your project. Create a file named composer.json with the following:
```json
{
    "require": {
       "namdongvando/imagesoptimizer": "^1.0"
    }
}
```
And run Composer to install Imagesoptimizer:

```bash
composer require namdongvando/imagesoptimizer 
```

## Code Samples

```php
<?php

include './src/Images.php';
Imagesoptimizer\Images::Optimizer("test.jpg");
Imagesoptimizer\Images::OptimizerFolder("public/");
?>
```
