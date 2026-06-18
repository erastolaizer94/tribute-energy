<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Product::create([
            'name' => 'Mono-crystalline Solar Panel 450W (Tier-1)',
            'description' => 'Tier-1 premium monocrystalline PV module featuring high-efficiency half-cut cell technology. Highly optimized for Tanzanian sun conditions to deliver sustained output over 25+ years.',
            'price' => 380000.00,
            'original_price' => null,
            'color' => 'linear-gradient(135deg, #1e293b, #0f172a)',
            'color_start' => '#1e293b',
            'color_end' => '#0f172a',
            'flavor' => null,
            'size' => '450W',
            'rating' => 5,
            'reviews' => 48,
            'specs' => json_encode([
                'Maximum Power: 450W',
                'Cell Type: Monocrystalline',
                'Efficiency: 21.8%',
                'Operating Temp: -40°C to +85°C',
                'Warranty: 25 Years',
                'Dimensions: 2094 x 1038 x 35 mm'
            ]),
            'category' => 'Solar Panels',
            'is_featured' => true,
            'is_new' => false,
            'is_sale' => false,
            'image' => 'https://images.unsplash.com/photo-1509391366360-2e959784a276?q=80&w=600',
            'is_active' => true
        ]);

        \App\Models\Product::create([
            'name' => 'Solar Submersible Borehole Pump 1.5HP (1100W)',
            'description' => 'Heavy-duty stainless steel submersible solar water pump designed for deep boreholes, rural communities, and agricultural farm irrigation. Fully compatible with DC direct solar panels.',
            'price' => 1250000.00,
            'original_price' => null,
            'color' => 'linear-gradient(135deg, #cbd5e1, #94a3b8)',
            'color_start' => '#cbd5e1',
            'color_end' => '#94a3b8',
            'flavor' => null,
            'size' => '1.5HP',
            'rating' => 5,
            'reviews' => 36,
            'specs' => json_encode([
                'Power: 1.5HP (1100W)',
                'Max Head: 120 Meters',
                'Max Flow: 6,000 Liters/Hour',
                'Outlet Size: 1.25 Inches',
                'Operating Voltage: 110V DC',
                'Material: Stainless Steel'
            ]),
            'category' => 'Solar Pumps',
            'is_featured' => true,
            'is_new' => true,
            'is_sale' => false,
            'image' => 'https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?q=80&w=600',
            'is_active' => true
        ]);

        \App\Models\Product::create([
            'name' => 'Smart Solar Pump Controller & Inverter (3-Phase, 2.2kW)',
            'description' => 'Pure-sine wave smart intelligent pump controller supporting dual input (solar DC + generator/grid AC). Built-in dry-run protection, MPPT tracking, and water level sensors.',
            'price' => 850000.00,
            'original_price' => 950000.00,
            'color' => 'linear-gradient(135deg, #38bdf8, #0284c7)',
            'color_start' => '#38bdf8',
            'color_end' => '#0284c7',
            'flavor' => null,
            'size' => '2.2kW',
            'rating' => 5,
            'reviews' => 19,
            'specs' => json_encode([
                'Input Voltage: 150V - 450V DC',
                'Max Output: 2.2kW (3HP)',
                'Efficiency: 99.8% MPPT',
                'Protection Class: IP65 Outdoor',
                'Support: 3-Phase AC Pumps',
                'Dual Input: DC Solar & AC Grid'
            ]),
            'category' => 'Inverters & Controllers',
            'is_featured' => true,
            'is_new' => false,
            'is_sale' => true,
            'image' => 'https://images.unsplash.com/photo-1620038634433-2895fe8057be?q=80&w=600',
            'is_active' => true
        ]);

        \App\Models\Product::create([
            'name' => 'Premium LiFePO4 Lithium Solar Battery 48V 100Ah (5kWh)',
            'description' => 'High-density Lithium Iron Phosphate (LiFePO4) solar storage battery with integrated Smart BMS. Built for 6,000+ deep charge cycles to supply constant electricity at night.',
            'price' => 3800000.00,
            'original_price' => null,
            'color' => 'linear-gradient(135deg, #34d399, #059669)',
            'color_start' => '#34d399',
            'color_end' => '#059669',
            'flavor' => null,
            'size' => '5kWh',
            'rating' => 5,
            'reviews' => 42,
            'specs' => json_encode([
                'Nominal Voltage: 48.0V',
                'Capacity: 100Ah (4.8kWh)',
                'Cycle Life: 6000+ cycles @ 80% DoD',
                'Max Charge Current: 50A',
                'Integrated Smart BMS: Yes',
                'Chemistry: Lithium Iron Phosphate'
            ]),
            'category' => 'Storage Systems',
            'is_featured' => true,
            'is_new' => false,
            'is_sale' => false,
            'image' => 'https://images.unsplash.com/photo-1595246140625-573b715d11dc?q=80&w=600',
            'is_active' => true
        ]);

        \App\Models\Product::create([
            'name' => 'Solar Hybrid Inverter 5kVA / 48V (Pure Sine Wave)',
            'description' => 'Smart hybrid solar power inverter combining MPPT solar charger controller, AC battery charger, and pure sine wave inverter. Perfect for homes, offices, and backup systems.',
            'price' => 1950000.00,
            'original_price' => 2200000.00,
            'color' => 'linear-gradient(135deg, #fbbf24, #d97706)',
            'color_start' => '#fbbf24',
            'color_end' => '#d97706',
            'flavor' => null,
            'size' => '5kVA',
            'rating' => 5,
            'reviews' => 31,
            'specs' => json_encode([
                'Rated Power: 5000W / 5kVA',
                'DC Input: 48V',
                'Solar Charger: 80A MPPT',
                'AC Output: 230V AC Pure Sine',
                'Surge Power: 10kVA',
                'Transfer Time: 10 ms'
            ]),
            'category' => 'Inverters & Controllers',
            'is_featured' => false,
            'is_new' => true,
            'is_sale' => true,
            'image' => 'https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?q=80&w=600',
            'is_active' => true
        ]);

        \App\Models\Product::create([
            'name' => 'High-Discharge Solar Surface Centrifugal Pump (1HP)',
            'description' => 'High-efficiency brushless DC solar surface pump. Best choice for suction from rivers, shallow wells, ponds, or booster systems for farm drip irrigation.',
            'price' => 980000.00,
            'original_price' => null,
            'color' => 'linear-gradient(135deg, #f87171, #dc2626)',
            'color_start' => '#f87171',
            'color_end' => '#dc2626',
            'flavor' => null,
            'size' => '1HP',
            'rating' => 4,
            'reviews' => 12,
            'specs' => json_encode([
                'Power: 750W (1HP)',
                'Max Suction: 8 Meters',
                'Max Flow: 15,000 Liters/Hour',
                'Inlet/Outlet: 2 Inch',
                'Controller Included: Yes',
                'Voltage: 72V DC'
            ]),
            'category' => 'Solar Pumps',
            'is_featured' => false,
            'is_new' => false,
            'is_sale' => false,
            'image' => 'https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?q=80&w=600',
            'is_active' => true
        ]);
    }
}
