<?php

namespace Fferriere\TestAtoumJson\Lib;

interface JsonConverterInterface
{

    /**
     * @param JsonSerializable $object
     * @return string json
     */
    public function convertToJson(\JsonSerializable $object);

}
