<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Gallery::create([
            'title' => 'Utility-Scale Solar Farm',
            'description' => 'Large scale solar farm installation powering commercial grid networks in Tanzania.',
            'image' => 'https://images.unsplash.com/photo-1509391366360-2e959784a276?q=80&w=1000',
            'category' => 'commercial',
            'is_featured' => true,
            'order' => 1,
            'is_active' => true
        ]);

        \App\Models\Gallery::create([
            'title' => 'Solar Water Pump System',
            'description' => 'Solar-powered submersible borehole water pump irrigating community crops in Dodoma.',
            'image' => 'https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?q=80&w=1000',
            'category' => 'agricultural',
            'order' => 2,
            'is_active' => true
        ]);

        \App\Models\Gallery::create([
            'title' => 'Industrial Solar Rooftop',
            'description' => 'Large scale rooftop panel arrays delivering continuous power for manufacturing factory in Mwanza.',
            'image' => 'https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?q=80&w=1000',
            'category' => 'industrial',
            'order' => 3,
            'is_active' => true
        ]);

        \App\Models\Gallery::create([
            'title' => 'Residential Off-Grid Storage',
            'description' => 'Pure sine-wave inverter and battery storage installation supplying zero-outage electricity to homes.',
            'image' => 'https://images.unsplash.com/photo-1595246140625-573b715d11dc?q=80&w=1000',
            'category' => 'residential',
            'order' => 4,
            'is_active' => true
        ]);

        \App\Models\Gallery::create([
            'title' => 'Smart MPPT Controller Setup',
            'description' => 'Precision MPPT solar controllers and smart wiring array configured for a school installation.',
            'image' => 'https://images.unsplash.com/photo-1620038634433-2895fe8057be?q=80&w=1000',
            'category' => 'installations',
            'order' => 5,
            'is_active' => true
        ]);

        \App\Models\Gallery::create([
            'title' => 'Rural Irrigation Suction Pump',
            'description' => 'Suction centrifugal solar water pump setup on a farm near Morogoro.',
            'image' => 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?q=80&w=1000',
            'category' => 'agricultural',
            'order' => 6,
            'is_active' => true
        ]);

        \App\Models\Gallery::create([
            'title' => 'Commercial Facility Solar',
            'description' => 'Sleek monocrystalline solar panels mounted on premium flat-roof structures.',
            'image' => 'https://images.unsplash.com/photo-1548613053-22087dd8edb8?q=80&w=1000',
            'category' => 'commercial',
            'is_featured' => true,
            'order' => 7,
            'is_active' => true
        ]);

        \App\Models\Gallery::create([
            'title' => 'Home Solar Panel Mounting',
            'description' => 'Solar panels installed on an sloped roof with premium aluminium mounting rails.',
            'image' => 'https://images.unsplash.com/photo-1613665813446-82a78c468a1d?q=80&w=1000',
            'category' => 'residential',
            'order' => 8,
            'is_active' => true
        ]);

        \App\Models\Gallery::create([
            'title' => 'High-Voltage Inverter Panel',
            'description' => 'Industrial-grade grid-tied three-phase solar inverter configuration.',
            'image' => 'https://images.unsplash.com/photo-1558449028-b53a39d100fc?q=80&w=1000',
            'category' => 'industrial',
            'order' => 9,
            'is_active' => true
        ]);
    }
}
