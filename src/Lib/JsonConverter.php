<?php

namespace Fferriere\TestAtoumJson\Lib;

class JsonConverter implements JsonConverterInterface
{

    /**
     * @inheritdoc
     */
    public function convertToJson(\JsonSerializable $object)
    {
        return json_encode($object);
    }

}
