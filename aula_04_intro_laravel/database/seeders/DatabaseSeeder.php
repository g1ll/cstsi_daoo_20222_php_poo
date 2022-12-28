<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'idade'=>34,
            'is_admin'=>true
        ]);

        \App\Models\User::factory(3)->create();


        $seedRegiao = new RegiaoSeeder();
        $seedRegiao->run();

        (new EstadoSeeder)->run();

        // \App\Models\Fornecedor::factory(fake()->randomNumber(2))
        //     ->hasProdutos(fake()->randomNumber(1))
        //     ->create();

        \App\Models\Fornecedor::factory(5)
            ->hasProdutos(10)
            ->create();
    }
}
