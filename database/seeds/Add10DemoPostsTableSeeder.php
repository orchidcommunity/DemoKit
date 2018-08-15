<?php
namespace Orchids\DemoKit\Database\Seeds;

use Orchids\DemoKit\Models\DemoPost;
use Illuminate\Database\Seeder;
use Orchid\Press\Models\Comment;
use Orchid\Attachment\Models\Attachmentable;

class Add10DemoPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * vendor/orchids/demokit/database/seeds
     * php artisan db:seed --class="Orchids\DemoKit\Database\Seeds\Add10DemoPostsTableSeeder"
     * @return void
     */
    public function run()
    {
        factory(DemoPost::class, 10)->create()->each(function ($p) {
            //factory(Attachmentable::class, 4)->create(['attachmentable_id' => $p->id]);
        });
    }
}
