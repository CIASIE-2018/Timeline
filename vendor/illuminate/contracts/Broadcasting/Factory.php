<?php

namespace Illuminate\Contracts\Broadcasting;

interface Factory
{
    /**
     * Get a broadcaster implementation by name.
     *
<<<<<<< HEAD
     * @param  string  $name
=======
     * @param  string|null  $name
>>>>>>> master
     * @return void
     */
    public function connection($name = null);
}
