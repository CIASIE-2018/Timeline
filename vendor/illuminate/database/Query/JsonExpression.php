<?php

namespace Illuminate\Database\Query;

use InvalidArgumentException;

class JsonExpression extends Expression
{
    /**
     * Create a new raw query expression.
     *
     * @param  mixed  $value
     * @return void
     */
    public function __construct($value)
    {
        parent::__construct(
            $this->getJsonBindingParameter($value)
        );
    }

    /**
     * Translate the given value into the appropriate JSON binding parameter.
     *
     * @param  mixed  $value
     * @return string
     */
    protected function getJsonBindingParameter($value)
    {
<<<<<<< HEAD
        switch ($type = gettype($value)) {
            case 'boolean':
                return $value ? 'true' : 'false';
            case 'integer':
            case 'double':
                return $value;
=======
        if ($value instanceof Expression) {
            return $value->getValue();
        }

        switch ($type = gettype($value)) {
            case 'boolean':
                return $value ? 'true' : 'false';
            case 'NULL':
            case 'integer':
            case 'double':
>>>>>>> master
            case 'string':
                return '?';
            case 'object':
            case 'array':
                return '?';
        }

<<<<<<< HEAD
        throw new InvalidArgumentException('JSON value is of illegal type: '.$type);
=======
        throw new InvalidArgumentException("JSON value is of illegal type: {$type}");
>>>>>>> master
    }
}
