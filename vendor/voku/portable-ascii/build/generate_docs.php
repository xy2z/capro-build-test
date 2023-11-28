<?php

namespace _PhpScoper5e9ecd738c28;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/vendor/autoload.php';
$readmeGenerator = new \_PhpScoper5e9ecd738c28\voku\PhpReadmeHelper\GenerateApi();
$readmeGenerator->templateMethod = <<<RAW
#### %name%
<a href="#voku-php-readme-class-methods">↑</a>
%description%

**Parameters:**
%params%

**Return:**
%return%

--------

RAW;
$readmeText = $readmeGenerator->generate(__DIR__ . '/../src/voku/helper/ASCII.php', __DIR__ . '/docs/base.md');
\file_put_contents(__DIR__ . '/../README.md', $readmeText);
