<?php

namespace Fferriere\TestAtoumJson\Lib\tests\units;

use atoum;
use Fferriere\TestAtoumJson\Lib\JsonConverterInterface;

class JsonConverter extends atoum
{

    public function testClass()
    {
        $this->testedClass
            ->implements(JsonConverterInterface::class);
    }

    public function testConvertToJson($name, $toConverted, $result)
    {
        $this
            ->assert($name)
            ->given(
                $this->newTestedInstance()
            )
            ->then(
                $converted = $this->testedInstance->convertToJson($toConverted)
            )
            ->json($converted)
                ->isEqualTo($result);
    }

    protected function testConvertToJsonDataProvider()
    {
        return [
            [
                'Simple JSON',
                new Person('Harry', 'Potter', new \DateTimeImmutable('1980-07-31')),
                '{"firstname":"Harry","lastname":"Potter","birthdate":"1980-07-31"}'
            ]
        ];
    }

}

class Person implements \JsonSerializable
{

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var \DateTimeInterface
     */
    private $birthdate;

    public function __construct($firstname, $lastname, \DateTimeInterface $birthdate)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->birthdate = $birthdate;
    }

    public function jsonSerialize()
    {
        return [
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'birthdate' => $this->birthdate->format('Y-m-d')
        ];
    }

}
