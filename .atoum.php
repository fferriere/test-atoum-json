<?php

require __DIR__ . '/vendor/autoload.php';

use mageekguy\atoum\jsonSchema;

$runner->addExtension(new jsonSchema\extension($script));
