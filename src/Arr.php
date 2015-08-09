<?php namespace PhilipBrown\Payload;

use Closure;

class Arr
{
    /**
     * @var array
     */
    private $attributes;

    /**
     * @param array $attributes
     * @return void
     */
    private function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * Create a new Arr
     *
     * @param array $attributes
     * @return self
     */
    public static function create($attributes)
    {
        return new self($attributes);
    }

    /**
     * Run a callback on each item
     *
     * @param Closure $callback
     * @return void
     */
    public function each(Closure $callback)
    {
        array_map($callback, $this->attributes);
    }

    /**
     * Run a Closure over each attibute and return a new Arr
     *
     * @param Closure $callback
     * @return self
     */
    public function map(Closure $callback)
    {
        return new self(array_map($callback, $this->attributes, array_keys($this->attributes)));
    }

    /**
     * Run a filter over each of the attributes
     *
     * @param Closure $callback
     * @return self
     */
    public function filter(Closure $callback = null)
    {
        if ($callback) return new self(array_filter($this->attributes, $callback));

        return new self(array_filter($this->attributes));
    }

    /**
     * Check to see if the Arr contains a value
     *
     * @param mixed $key
     * @param mixed $value
     * @return bool
     */
    public function contains($key, $value = null)
    {
        if (func_num_args() == 2) {
            return $this->contains(function ($k, $item) use ($key, $value) {
                if (self::isArray($item)) return self::pluck($item, $key) == $value;

                return $item == $value;
            });
        }

        if (is_callable($key)) {
            return ! is_null(self::first($this->attributes, $key));
        }

        return in_array($key, $this->attributes);
    }

    /**
     * Get an attribute of the Array
     *
     * @param mixed $key
     * @return mixed
     */
    public function get($key)
    {
        $value = self::pluck($this->attributes, $key);

        if (! self::isArray($value)) return $value;

        return self::create($value);
    }

    /**
     * Reset the keys on the underlying array
     *
     * @return self
     */
    public function values()
    {
        return new self(array_values($this->attributes));
    }

    /**
     * Return the Arr as an array
     *
     * @return array
     */
    public function toArray()
    {
        return $this->attributes;
    }

    /**
     * Check to see if an array has a key
     *
     * @param array $data
     * @param string $key
     * @return bool
     */
    public static function has(array $data, $key)
    {
        return isset($data[$key]);
    }

    /**
     * Pluck an item from the array or return a default
     *
     * @param array $data
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function pluck(array $data, $key, $default = null)
    {
        if (! self::has($data, $key)) return $default;

        return $data[$key];
    }

    /**
     * Return the first value using a callback
     *
     * @param array $data
     * @param callable $callback
     * @param mixed $default
     * @return mixed
     */
    public static function first(array $data, callable $callback, $default = null)
    {
        foreach ($data as $key => $value) {
            if (call_user_func($callback, $key, $value)) {
                return $value;
            }
        }

        return $default;
    }

    /**
     * Check to see if a value is an array
     *
     * @param mixed $value
     * @return bool
     */
    public static function isArray($value)
    {
        return is_array($value);
    }

    /**
     * Get an attribute of the Array
     *
     * @param string $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->get($key);
    }
}
