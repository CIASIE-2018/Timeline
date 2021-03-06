<?php

namespace Illuminate\Contracts\Database;

class ModelIdentifier
{
    /**
     * The class name of the model.
     *
     * @var string
     */
    public $class;

    /**
     * The unique identifier of the model.
     *
     * This may be either a single ID or an array of IDs.
     *
     * @var mixed
     */
    public $id;

    /**
<<<<<<< HEAD
=======
     * The relationships loaded on the model.
     *
     * @var array
     */
    public $relations;

    /**
>>>>>>> master
     * The connection name of the model.
     *
     * @var string|null
     */
    public $connection;

    /**
     * Create a new model identifier.
     *
     * @param  string  $class
     * @param  mixed  $id
<<<<<<< HEAD
     * @param  mixed  $connection
     * @return void
     */
    public function __construct($class, $id, $connection)
    {
        $this->id = $id;
        $this->class = $class;
=======
     * @param  array  $relations
     * @param  mixed  $connection
     * @return void
     */
    public function __construct($class, $id, array $relations, $connection)
    {
        $this->id = $id;
        $this->class = $class;
        $this->relations = $relations;
>>>>>>> master
        $this->connection = $connection;
    }
}
