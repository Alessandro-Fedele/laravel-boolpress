<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Viaggi', 'Cucina', 'Animali', 'Sport', 'Musica', 'Cinema'];

        foreach ($categories as $category) {
            $new_category_object = new Category();
            $new_category_object->name = $category;
            $new_category_object->save();
        }
    }
}
