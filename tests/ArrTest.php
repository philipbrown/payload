<?php namespace PhilipBrown\Payload\Tests;

use PhilipBrown\Payload\Arr;

class ArrTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function should_check_to_see_if_array_has_key()
    {
        $this->assertFalse(Arr::has([], 'hello'));

        $this->assertTrue(Arr::has(['hello' => 'world'], 'hello'));
    }

    /** @test */
    public function should_get_item_or_return_default()
    {
        $this->assertEquals('world', Arr::pluck(['hello' => 'world'], 'hello'));

        $this->assertNull(Arr::pluck([], 'hello'));

        $this->assertEquals('world', Arr::pluck([], 'hello', 'world'));
    }

    /** @test */
    public function should_return_the_first_item_using_a_callback()
    {
        $this->assertEquals(2, Arr::first([1,2,3], function ($key, $item) {
            if ($item % 2 == 0) return $item;
        }));
    }

    /** @test */
    public function should_return_as_array()
    {
        $this->assertTrue(is_array(Arr::create([])->toArray()));
    }

    /** @test */
    public function should_check_to_see_if_value_is_array()
    {
        $this->assertFalse(Arr::isArray('nope'));

        $this->assertTrue(Arr::isArray(['yep']));
    }

    /** @test */
    public function should_get_value_from_array()
    {
        $this->assertEquals('world', Arr::create(['hello' => 'world'])->hello);
    }

    /** @test */
    public function should_return_arr_when_value_is_array()
    {
        $this->assertInstanceOf(Arr::class, Arr::create(['hello' => ['world', 'universer']])->hello);
    }

    /** @test */
    public function should_run_callback_on_each_attribute()
    {
        Arr::create([1, 2, 3])->each(function ($attribute) {
            $this->assertTrue(is_int($attribute));
        });
    }

    /** @test */
    public function should_run_callback_on_each_attribute_and_return_new_arr()
    {
        $arr = Arr::create([1,2,3])->map(function ($attribute) {
            return $attribute * 2;
        });

        $this->assertEquals([2,4,6], $arr->toArray());
    }

    /** @test */
    public function should_filter_array()
    {
        $arr = Arr::create([1,2,3])->filter(function ($attribute) {
            return $attribute % 2 == 0;
        });

        $this->assertEquals([2], $arr->values()->toArray());
    }

    /** @test */
    public function should_see_if_array_contains_value()
    {
        $this->assertTrue(Arr::create([1,2,3])->contains(1));

        $this->assertFalse(Arr::create([1,2,3])->contains(4));

        $this->assertTrue(Arr::create(['hello' => 'world'])->contains('hello', 'world'));

        $this->assertFalse(Arr::create(['hello' => 'world'])->contains('yo', 'dawg'));
    }
}
