<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name();
        $firstName = explode(" ", $name)[0];
        $restName = [];
        preg_match_all("/(?<=(\s|\.))\w/", $name, $restName);
        return [
            "name" => $name,
            "email" => strtolower($firstName . "." . implode("", $restName[0]) . "@gmail.com"),
            "password" => hash("sha256", strtolower($firstName))
        ];
    }
}
