<?php

use Illuminate\Database\Seeder;
use App\Interest;

class InterestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $interests = ['Sport', 'Reading', 'Movie', 'Writing', 'Games', 'Social activities', 'Music'];

      foreach($interests as $interestName) {
        $interest = new Interest();
        $interest->name = $interestName;
        $interest->save();
      }
    }
}
