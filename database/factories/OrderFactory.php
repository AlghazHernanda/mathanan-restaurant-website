<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // dummy data untuk cart
        //$json_cart = {"a775bac9cff7dec2b984e023b95206aa":{"rowId":"a775bac9cff7dec2b984e023b95206aa","id":3,"name":"cumque optio molestiae est et","qty":2,"price":320,"options":[],"tax":"0.00","isSaved":false,"subtotal":"640.00","model":{"id":3,"name":"cumque optio molestiae est et","slug":"cumque-optio-molestiae-est-et","description":"Id qui in illum veritatis. Est alias doloremque repellendus odit aut. Animi beatae repudiandae ut.","regular_price":"320.00","quantity":14,"image":"menu-11.jpeg","images":null,"featured":0,"created_at":"2023-03-19T12:20:05.000000Z","updated_at":"2023-03-19T12:20:05.000000Z"}},"370d08585360f5c568b18d1f2e4ca1df":{"rowId":"370d08585360f5c568b18d1f2e4ca1df","id":2,"name":"delectus nam harum ipsa alias","qty":1,"price":248,"options":[],"tax":"0.00","isSaved":false,"subtotal":"248.00","model":{"id":2,"name":"delectus nam harum ipsa alias","slug":"delectus-nam-harum-ipsa-alias","description":"Illo iusto nihil delectus quod facere voluptates et. Iusto excepturi quae rerum. Corrupti repudiandae occaecati numquam magnam.","regular_price":"248.00","quantity":39,"image":"menu-7.jpeg","images":null,"featured":0,"created_at":"2023-03-19T12:20:05.000000Z","updated_at":"2023-03-19T12:20:05.000000Z"}}}
        return [
            'name' => "Mohamad Alghaz",
            'email' => 'user@gmail.com',
            'address' => 'Taman Sentosa Blok C / 6 No.10',
            'phonenumber' => "081219288648",
            'cart' => '{"a775bac9cff7dec2b984e023b95206aa":{"rowId":"a775bac9cff7dec2b984e023b95206aa","id":3,"name":"cumque optio","qty":2,"price":320,"options":[],"tax":"0.00","isSaved":false,"subtotal":"640.00","model":{"id":3,"name":"cumque optio ","slug":"cumque-optio-molestiae-est-et","description":"Id qui in illum veritatis. Est alias doloremque repellendus odit aut. Animi beatae repudiandae ut.","regular_price":"320.00","quantity":14,"image":"menu-11.jpeg","images":null,"featured":0,"created_at":"2023-03-19T12:20:05.000000Z","updated_at":"2023-03-19T12:20:05.000000Z"}},"370d08585360f5c568b18d1f2e4ca1df":{"rowId":"370d08585360f5c568b18d1f2e4ca1df","id":2,"name":"delectus nam","qty":1,"price":248,"options":[],"tax":"0.00","isSaved":false,"subtotal":"248.00","model":{"id":2,"name":"delectus nam","slug":"delectus-nam-harum-ipsa-alias","description":"Illo iusto nihil delectus quod facere voluptates et. Iusto excepturi quae rerum. Corrupti repudiandae occaecati numquam magnam.","regular_price":"248.00","quantity":39,"image":"menu-7.jpeg","images":null,"featured":0,"created_at":"2023-03-19T12:20:05.000000Z","updated_at":"2023-03-19T12:20:05.000000Z"}}}',
            'total_price' => $this->faker->numberBetween(10000, 50000),
            'status' => 'belum pesan',
            'transaction_id' => 'bba38433-df79-4af0-b90b-541b8aa0820f',
            'payment_type' => 'bank_transfer',
            'status_antar' => 'BELUM'
        ];
    }
}
