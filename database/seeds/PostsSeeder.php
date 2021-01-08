<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Seed the first post
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'title' => 'First Post',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam in tellus ac erat facilisis tincidunt et nec nulla. Praesent odio mauris, fringilla vulputate risus non, pellentesque pretium enim. Vestibulum semper purus est. Nullam accumsan lorem sed turpis accumsan molestie. Nam dignissim fermentum magna, at placerat ligula ornare convallis. Nullam metus risus, tristique non accumsan vitae, vehicula id leo. Cras sit amet elit nulla. Maecenas sagittis dui vulputate erat dapibus, at dictum lorem viverra. Morbi ac elit sit amet nulla luctus lobortis.',
            'author' => 1,
        ]);
    }
}
