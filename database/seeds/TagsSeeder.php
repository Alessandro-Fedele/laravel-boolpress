<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['cibo', 'viaggio', 'foto', 'ragazze', 'shopping', 'calcio'];
        foreach ($tags as $tag) {
            $new_tag_object = new Tag();
            $new_tag_object->name = $tag;
            $new_tag_object->save();
        }
    }
}
