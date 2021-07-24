<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $arr = array(
            'Café',
            'Leche',
            'Pan',
            'Golosinas',
            'Frutas',
            'Avena',
            'Azucar'
        );

        return [ 
            'invoice_id' => $this->faker->numberBetween(1, 3),
            'name'       => $this->faker->randomElement($arr),
            'quantity'   => $this->faker->numberBetween(1, 105),   
            'price'      => $this->faker->randomFloat(2, 1000, 10000), 
        ];
    }
}
