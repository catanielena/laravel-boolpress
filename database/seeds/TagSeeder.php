<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['latest news', 'gossip', 'science', 'cinema', 'history', 'sport', 'lifestyle', 'enviroment'];

        foreach($tags as $tag)
        {
            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->slug = Str::of($tag)->slug('-');
            $newTag->save();
        }
    }
}
