<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Comment::class, 50)->create()->each(function($comment){
            
            $pick = rand(0,1);
            if($pick){
                  $otherComment = \App\Models\Comment::where('parent_id', null)->get()->random();    
                  $comment->update([
                    'parent_id' => $otherComment->id    
                ]);
            }
          
        });
    }
}
