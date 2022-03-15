<?php

use Illuminate\Database\Seeder;

use App\Category;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $categories = [
            'Fantasy',
            'Thriller',
            'Sci-Fi',
            'Crime',
            'Adventure',
            'Horror'
        ];

        foreach ($categories as $category) {
            $newCategory = new Category();

            $newCategory->code = $category;

            $newCategory->save();
        }
    }
}
