@extends('layouts.site')

@section('title', 'Blog')
@section('meta_description', 'Tribute Energy blog — performance tips, ingredient science, athlete stories, and more.')

@section('content')

    <section class="relative pt-32 pb-20 overflow-hidden bg-white">
        <div class="relative z-10 max-w-7xl mx-auto px-5 lg:px-8 text-center">
            <div class="section-label mb-4">The Tribute Journal</div>
            <h1 class="font-bebas text-7xl lg:text-[110px] leading-none">
                INSIGHTS FOR<br>
                <span class="text-gradient">PEAK PERFORMERS</span>
            </h1>
            <div class="divider mx-auto mt-5 mb-6"></div>
            <p class="text-gray-400 max-w-2xl mx-auto text-lg">Science-backed articles, athlete stories, and tips to fuel your journey.</p>
        </div>
    </section>

    <section class="py-16 max-w-7xl mx-auto px-5 lg:px-8">
        @php
        $categories = ['All','Science','Nutrition','Training','Athlete Stories','Recipes'];
        $posts = [
            ['cat' => 'Science',     'title' => 'The Science Behind Caffeine Timing for Performance',     'date' => 'May 28, 2026', 'read' => '8 min', 'color' => '#8B00FF'],
            ['cat' => 'Nutrition',   'title' => 'What to Eat Before and After Your Workout',              'date' => 'May 20, 2026', 'read' => '6 min', 'color' => '#00C851'],
            ['cat' => 'Training',    'title' => 'How Pro Athletes Structure Their Training Weeks',        'date' => 'May 15, 2026', 'read' => '10 min', 'color' => '#0066FF'],
            ['cat' => 'Athlete Stories', 'title' => 'From Couch to 5K: One Developer\'s Journey',         'date' => 'May 10, 2026', 'read' => '7 min', 'color' => '#FF6B00'],
            ['cat' => 'Recipes',     'title' => '5 Tribute-Powered Smoothie Recipes',                    'date' => 'May 5, 2026',  'read' => '5 min', 'color' => '#FFB800'],
            ['cat' => 'Science',     'title' => 'Beta-Alanine: Why Your Muscles Tingle (And Why It Works)', 'date' => 'Apr 28, 2026', 'read' => '9 min', 'color' => '#8B00FF'],
            ['cat' => 'Nutrition',   'title' => 'The Complete Guide to Electrolytes for Athletes',       'date' => 'Apr 20, 2026', 'read' => '11 min', 'color' => '#00C851'],
            ['cat' => 'Training',    'title' => 'Recovery Protocols Used by Olympic-Level Athletes',      'date' => 'Apr 12, 2026', 'read' => '8 min', 'color' => '#0066FF'],
            ['cat' => 'Athlete Stories', 'title' => 'Breaking Plateaus: How I Set a New PR at 42',        'date' => 'Apr 5, 2026',  'read' => '6 min', 'color' => '#FF6B00'],
        ];
        @endphp

        <div class="flex flex-wrap gap-2 mb-12" x-data="{ active: 'All' }">
            @foreach($categories as $c)
            <button x-on:click="active = '{{ $c }}'"
                    class="px-5 py-2 text-sm font-rajdhani font-700 tracking-wider uppercase rounded-full transition-all border"
                    :class="active === '{{ $c }}' ? 'bg-[#FF6B00] border-[#FF6B00] text-white' : 'bg-transparent border-[#252525] text-gray-500 hover:border-[#FF6B00]/50 hover:text-white'">
                {{ $c }}
            </button>
            @endforeach
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $i => $p)
            <a href="#" class="card group overflow-hidden" data-aos="fade-up" data-aos-delay="{{ ($i % 9) * 50 }}">
                <div class="h-44 flex items-center justify-center font-bebas text-6xl text-white/10 select-none"
                     style="background: linear-gradient(135deg, {{ $p['color'] }}22, {{ $p['color'] }}11);">
                    <i class="fas fa-newspaper"></i>
                </div>
                <div class="p-5">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="text-[10px] font-rajdhani font-700 tracking-wider uppercase px-2 py-1 rounded" style="background: {{ $p['color'] }}22; color: {{ $p['color'] }}">{{ $p['cat'] }}</span>
                        <span class="text-gray-600 text-xs">{{ $p['read'] }}</span>
                    </div>
                    <h3 class="font-rajdhani font-700 text-sm text-white group-hover:text-[#FF6B00] transition-colors leading-snug">{{ $p['title'] }}</h3>
                    <p class="text-gray-600 text-xs mt-2">{{ $p['date'] }}</p>
                </div>
            </a>
            @endforeach
        </div>

        <div class="text-center mt-12" data-aos="fade-up">
            <button class="btn-outline"><span>Load More Articles</span> <i class="fas fa-chevron-down"></i></button>
        </div>
    </section>

    <section class="py-20 bg-[#0D0D0D] border-y border-[#1A1A1A]">
        <div class="max-w-3xl mx-auto px-5 text-center" data-aos="fade-up">
            <div class="w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-5 bg-[#FF6B00]/10 border border-[#FF6B00]/20">
                <i class="fas fa-envelope-open-text text-2xl text-[#FF6B00]"></i>
            </div>
            <h2 class="font-bebas text-5xl mb-3">GET THE <span class="text-gradient">EDGE</span></h2>
            <p class="text-gray-400 text-sm max-w-md mx-auto mb-6">Subscribe to our newsletter for exclusive performance tips, product drops, and insider content.</p>
            <div class="max-w-md mx-auto">
                <div class="flex gap-2 bg-[#111] border border-[#252525] p-1.5 rounded-full">
                    <input type="email" placeholder="Your email" class="flex-1 bg-transparent border-none px-4 py-2 text-sm text-white placeholder-gray-600 outline-none">
                    <button class="bg-gradient-to-r from-[#FF6B00] to-[#FF8C00] text-white px-6 py-2 rounded-full text-sm font-rajdhani font-700 tracking-wider uppercase hover:shadow-lg hover:shadow-[#FF6B00]/30 transition-all">Subscribe</button>
                </div>
            </div>
        </div>
    </section>

@endsection
