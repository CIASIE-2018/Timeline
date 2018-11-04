<?php

namespace Illuminate\Container;

<<<<<<< HEAD
=======
use Illuminate\Support\Arr;
>>>>>>> master
use Illuminate\Contracts\Container\ContextualBindingBuilder as ContextualBindingBuilderContract;

class ContextualBindingBuilder implements ContextualBindingBuilderContract
{
    /**
     * The underlying container instance.
     *
     * @var \Illuminate\Container\Container
     */
    protected $container;

    /**
     * The concrete instance.
     *
     * @var string
     */
    protected $concrete;

    /**
     * The abstract target.
     *
     * @var string
     */
    protected $needs;

    /**
     * Create a new contextual binding builder.
     *
     * @param  \Illuminate\Container\Container  $container
<<<<<<< HEAD
     * @param  string  $concrete
=======
     * @param  string|array  $concrete
>>>>>>> master
     * @return void
     */
    public function __construct(Container $container, $concrete)
    {
        $this->concrete = $concrete;
        $this->container = $container;
    }

    /**
     * Define the abstract target that depends on the context.
     *
     * @param  string  $abstract
     * @return $this
     */
    public function needs($abstract)
    {
        $this->needs = $abstract;

        return $this;
    }

    /**
     * Define the implementation for the contextual binding.
     *
     * @param  \Closure|string  $implementation
     * @return void
     */
    public function give($implementation)
    {
<<<<<<< HEAD
        $this->container->addContextualBinding(
            $this->concrete, $this->needs, $implementation
        );
=======
        foreach (Arr::wrap($this->concrete) as $concrete) {
            $this->container->addContextualBinding($concrete, $this->needs, $implementation);
        }
>>>>>>> master
    }
}
