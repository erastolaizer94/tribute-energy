<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function home()
    {
        $featured = $this->allProducts()->slice(0, 4)->values();
        return view('pages.home', compact('featured'));
    }

    public function features()
    {
        return view('pages.features');
    }

    public function products()
    {
        $products = $this->allProducts();
        return view('pages.products', compact('products'));
    }

    public function pricing()
    {
        return view('pages.pricing');
    }

    public function terms()
    {
        return view('pages.terms');
    }

    public function about()
    {
        return view('pages.about');
    }

    private function allProducts()
    {
        return collect([
            ['id' => 1, 'name' => 'Tribute Original',  'flavor' => 'Tropical Blast',    'price' => 3.99,  'size' => '16oz',       'category' => 'drink',  'tag' => 'Best Seller', 'tag_color' => 'orange', 'rating' => 4.9, 'reviews' => 2847, 'color_start' => '#FF6B00', 'color_end' => '#FF8C00'],
            ['id' => 2, 'name' => 'Tribute Zero',      'flavor' => 'Arctic Mint',        'price' => 3.99,  'size' => '16oz',       'category' => 'drink',  'tag' => 'Zero Sugar',  'tag_color' => 'blue',   'rating' => 4.8, 'reviews' => 1923, 'color_start' => '#0066FF', 'color_end' => '#00AAFF'],
            ['id' => 3, 'name' => 'Tribute Pro',       'flavor' => 'Blue Razz',          'price' => 4.49,  'size' => '16oz',       'category' => 'drink',  'tag' => 'Performance', 'tag_color' => 'purple', 'rating' => 4.9, 'reviews' => 3421, 'color_start' => '#8B00FF', 'color_end' => '#CC00FF'],
            ['id' => 4, 'name' => 'Tribute Boost',     'flavor' => 'Citrus Surge',       'price' => 4.99,  'size' => '16oz',       'category' => 'drink',  'tag' => 'Max Energy',  'tag_color' => 'red',    'rating' => 4.7, 'reviews' => 1654, 'color_start' => '#FF2200', 'color_end' => '#FF6B00'],
            ['id' => 5, 'name' => 'Power Powder',      'flavor' => 'Watermelon Burst',   'price' => 44.99, 'size' => '40 servings','category' => 'powder', 'tag' => 'New',         'tag_color' => 'green',  'rating' => 4.8, 'reviews' => 892,  'color_start' => '#00C851', 'color_end' => '#007E33'],
            ['id' => 6, 'name' => 'Energy Matrix',     'flavor' => 'Mango Fusion',       'price' => 49.99, 'size' => '40 servings','category' => 'powder', 'tag' => 'Popular',     'tag_color' => 'orange', 'rating' => 4.9, 'reviews' => 1243, 'color_start' => '#FFAB00', 'color_end' => '#FF6D00'],
            ['id' => 7, 'name' => 'Variety Pack',      'flavor' => 'Mixed Flavors',      'price' => 34.99, 'size' => '12 cans',    'category' => 'bundle', 'tag' => 'Best Value',  'tag_color' => 'gold',   'rating' => 5.0, 'reviews' => 654,  'color_start' => '#FF6B00', 'color_end' => '#FFB800'],
            ['id' => 8, 'name' => 'Monthly Bundle',    'flavor' => 'Your Choice',        'price' => 89.99, 'size' => '30 cans',    'category' => 'bundle', 'tag' => 'Save 25%',    'tag_color' => 'orange', 'rating' => 4.9, 'reviews' => 421,  'color_start' => '#1A1A2E', 'color_end' => '#FF6B00'],
        ]);
    }
}
