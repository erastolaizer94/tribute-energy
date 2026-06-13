<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Testimonial::create([
            'name' => 'Jordan M.',
            'role' => 'Marathon Runner',
            'company' => null,
            'content' => "I've tried every energy supplement out there. Tribute Pro is the only one that gets me through 20-mile training runs without a single crash. Game changer.",
            'avatar' => null,
            'rating' => 5,
            'is_active' => true,
            'sort_order' => 1,
        ]);

        Testimonial::create([
            'name' => 'Aisha K.',
            'role' => 'Competitive Gamer',
            'company' => null,
            'content' => "My reaction times improved noticeably in the first week. The focus from Tribute Zero is unreal — no jitters, just clean, locked-in energy for hours.",
            'avatar' => null,
            'rating' => 5,
            'is_active' => true,
            'sort_order' => 2,
        ]);

        Testimonial::create([
            'name' => 'Marcus T.',
            'role' => 'CrossFit Coach',
            'company' => null,
            'content' => "I recommend Tribute Energy to all my athletes. The ingredient transparency is what sold me — you know exactly what you're putting in your body.",
            'avatar' => null,
            'rating' => 5,
            'is_active' => true,
            'sort_order' => 3,
        ]);
    }
}
