<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AchatArticle;
use App\Models\Address;
use App\Models\Article;
use App\Models\Client;
use App\Models\Fournisseur;
use App\Models\Person;
use App\Models\User;
use App\Models\VenteArticle;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('123456789'),
        ]);

        $person1 = Person::factory()->create();
        $person2 = Person::factory()->create();

        Address::factory(2)->create(
            [
                'person_id' => $person1->id,
            ]
        );

        Client::factory()->create(
            [
                'person_id' => $person1->id,
            ]
        );

        Address::factory(2)->create(
            [
                'person_id' => $person2->id,
            ]
        );

        Fournisseur::factory()->create(
            [
                'person_id' => $person2->id,
            ]
        );

        Article::factory(2)->create();
        
        AchatArticle::factory()->create(
            [
                'article_id' => 1,
            ]
        );

        VenteArticle::factory()->create(
            [
                'article_id' => 2,
            ]
        );

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
