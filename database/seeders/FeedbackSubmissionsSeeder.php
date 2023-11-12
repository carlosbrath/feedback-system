<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\FeedbackSubmission as ModelsFeedbackSubmission;

class FeedbackSubmissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories = ['Bug', 'Feature Request', 'Other'];

        for ($i = 0; $i < 10; $i++) {
            $feedbackSubmission = new ModelsFeedbackSubmission();
            $feedbackSubmission->user_id = random_int(1, 10);
            $feedbackSubmission->title = $faker->sentence(5);
            $feedbackSubmission->description = $faker->paragraph(5);
            $feedbackSubmission->category = $faker->randomElement($categories);
            $feedbackSubmission->save();
        }
    }
}
