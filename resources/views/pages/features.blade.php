@extends('layouts.landing')

@section('title', 'Features & Science')
@section('meta_description', 'Discover the science behind Tribute Energy. Clinical formulas, clean ingredients, third-party testing.')

@section('content')

    {{-- Hero --}}
    <section class="relative pt-32 pb-20 overflow-hidden">
        <div class="absolute inset-0 z-0" style="background: linear-gradient(135deg, #0A0A0A 0%, #150800 50%, #0A0A0A 100%);"></div>
        <div class="absolute inset-0 z-0 opacity-5"
             style="background: url('{{ asset('hero-bg.jpg') }}') center/cover no-repeat;"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-5 lg:px-8 text-center">
            <div class="section-label mb-4">The Tribute Science</div>
            <h1 class="font-bebas text-7xl lg:text-[110px] leading-none">
                ENGINEERED FOR<br>
                <span class="text-gradient">PEAK PERFORMANCE</span>
            </h1>
            <div class="divider mx-auto mt-5 mb-6"></div>
            <p class="text-gray-400 max-w-2xl mx-auto text-lg leading-relaxed">
                Every product we create starts in the lab and ends on the podium.
                Here's what separates Tribute from the rest.
            </p>
        </div>
    </section>

    {{-- Core Pillars --}}
    <section class="py-20 max-w-7xl mx-auto px-5 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $pillars = [
                [
                    'icon' => 'fa-flask',
                    'color' => '#FF6B00',
                    'title' => 'TriFuel™ Complex',
                    'desc' => 'Our patented three-pathway energy system combines caffeine anhydrous, L-theanine, and B-vitamin cofactors for synergistic, sustained cognitive performance.',
                    'items' => ['200mg Caffeine Anhydrous', '400mg L-Theanine', '100mg Vitamin B Complex']
                ],
                [
                    'icon' => 'fa-brain',
                    'color' => '#8B00FF',
                    'title' => 'NeuroFocus™ Blend',
                    'desc' => 'Alpha-GPC and Lion\'s Mane extract working together to sharpen focus, enhance memory consolidation, and improve reaction time under pressure.',
                    'items' => ['300mg Alpha-GPC', '250mg Lion\'s Mane', '100mg Bacopa Monnieri']
                ],
                [
                    'icon' => 'fa-heartbeat',
                    'color' => '#FF2200',
                    'title' => 'EnduraCore™ Matrix',
                    'desc' => 'Beta-alanine, citrulline malate, and electrolyte complex for maximum physical output, reduced fatigue, and superior recovery between efforts.',
                    'items' => ['3.2g Beta-Alanine', '6g Citrulline Malate', '1.5g Electrolyte Blend']
                ],
                [
                    'icon' => 'fa-shield-alt',
                    'color' => '#00C851',
                    'title' => 'AdaptShield™',
                    'desc' => 'Ashwagandha KSM-66, Rhodiola Rosea, and Panax Ginseng form our adaptogen stack — managing cortisol and building resilience to chronic stress.',
                    'items' => ['600mg KSM-66 Ashwagandha', '300mg Rhodiola Rosea', '200mg Panax Ginseng']
                ],
                [
                    'icon' => 'fa-certificate',
                    'color' => '#0066FF',
                    'title' => 'Purity Guarantee',
                    'desc' => 'Every batch undergoes independent third-party testing for 270+ banned substances, heavy metals, microbial contamination, and label accuracy.',
                    'items' => ['NSF Sport Certified', 'Informed Choice Verified', 'ISO 17025 Lab Testing']
                ],
                [
                    'icon' => 'fa-leaf',
                    'color' => '#FFB800',
                    'title' => 'Clean Label Promise',
                    'desc' => 'No artificial dyes, synthetic sweeteners, or proprietary blends. Every ingredient is disclosed with exact dosages on every single label.',
                    'items' => ['Zero Artificial Colors', 'No Aspartame / Sucralose', 'Full Ingredient Disclosure']
                ],
            ];
            @endphp

            @foreach($pillars as $i => $p)
            <div class="card p-7" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-5"
                     style="background: {{ $p['color'] }}20; border: 1px solid {{ $p['color'] }}30;">
                    <i class="fas {{ $p['icon'] }} text-2xl" style="color: {{ $p['color'] }};"></i>
                </div>
                <h3 class="font-rajdhani font-700 text-xl mb-3">{{ $p['title'] }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-5">{{ $p['desc'] }}</p>
                <ul class="space-y-2">
                    @foreach($p['items'] as $item)
                    <li class="flex items-center gap-2 text-sm text-gray-300">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#FF6B00] flex-shrink-0"></span>
                        {{ $item }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </section>

    {{-- Comparison Table --}}
    <section class="py-20 bg-[#0D0D0D] border-y border-[#1A1A1A]">
        <div class="max-w-5xl mx-auto px-5 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <div class="section-label mb-3">See The Difference</div>
                <h2 class="font-bebas text-6xl">TRIBUTE VS <span class="text-gradient">THE REST</span></h2>
                <div class="divider mx-auto mt-4"></div>
            </div>

            <div class="overflow-x-auto" data-aos="fade-up" data-aos-delay="100">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-[#1E1E1E]">
                            <th class="text-left py-4 px-5 text-gray-500 font-rajdhani font-700 tracking-wider uppercase text-xs w-1/3">Feature</th>
                            <th class="py-4 px-5 text-center">
                                <div class="inline-flex flex-col items-center">
                                    <span class="font-bebas text-xl text-[#FF6B00] tracking-wider">TRIBUTE</span>
                                    <span class="text-gray-500 text-xs font-rajdhani font-600">Energy</span>
                                </div>
                            </th>
                            <th class="py-4 px-5 text-center text-gray-600 font-rajdhani font-600 text-xs tracking-wider uppercase">Generic Brand A</th>
                            <th class="py-4 px-5 text-center text-gray-600 font-rajdhani font-600 text-xs tracking-wider uppercase">Generic Brand B</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $rows = [
                            ['label' => 'Clinically Dosed Ingredients',  'tribute' => true,  'a' => false, 'b' => false],
                            ['label' => 'Full Ingredient Transparency',   'tribute' => true,  'a' => false, 'b' => true],
                            ['label' => 'Third-Party Tested',             'tribute' => true,  'a' => false, 'b' => false],
                            ['label' => 'Zero Artificial Dyes',           'tribute' => true,  'a' => false, 'b' => false],
                            ['label' => 'Adaptogen Stack Included',       'tribute' => true,  'a' => false, 'b' => false],
                            ['label' => 'Crash-Free Formula',             'tribute' => true,  'a' => false, 'b' => true],
                            ['label' => 'NSF Sport Certified',            'tribute' => true,  'a' => false, 'b' => false],
                            ['label' => 'Vegan Friendly',                 'tribute' => true,  'a' => true,  'b' => true],
                        ];
                        @endphp
                        @foreach($rows as $i => $row)
                        <tr class="{{ $i % 2 === 0 ? 'bg-[#111]' : '' }} border-b border-[#1A1A1A]">
                            <td class="py-4 px-5 text-gray-300 font-inter text-sm">{{ $row['label'] }}</td>
                            <td class="py-4 px-5 text-center">
                                @if($row['tribute'])
                                    <i class="fas fa-check-circle text-[#FF6B00] text-base"></i>
                                @else
                                    <i class="fas fa-times-circle text-gray-700 text-base"></i>
                                @endif
                            </td>
                            <td class="py-4 px-5 text-center">
                                @if($row['a'])
                                    <i class="fas fa-check-circle text-gray-500 text-base"></i>
                                @else
                                    <i class="fas fa-times-circle text-gray-700 text-base"></i>
                                @endif
                            </td>
                            <td class="py-4 px-5 text-center">
                                @if($row['b'])
                                    <i class="fas fa-check-circle text-gray-500 text-base"></i>
                                @else
                                    <i class="fas fa-times-circle text-gray-700 text-base"></i>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    {{-- Process Steps --}}
    <section class="py-24 max-w-7xl mx-auto px-5 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="section-label mb-3">From Lab to Can</div>
            <h2 class="font-bebas text-6xl lg:text-7xl">HOW WE <span class="text-gradient">BUILD</span> IT</h2>
            <div class="divider mx-auto mt-4"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-0">
            @php
            $steps = [
                ['num' => '01', 'icon' => 'fa-microscope',  'title' => 'Research',   'desc' => 'Peer-reviewed literature and sports science inform every formulation decision.'],
                ['num' => '02', 'icon' => 'fa-flask',       'title' => 'Formulate',  'desc' => 'Our team of PhD formulators builds each blend from the ground up.'],
                ['num' => '03', 'icon' => 'fa-vials',       'title' => 'Test',       'desc' => 'Independent ISO labs verify purity, potency, and safety before production.'],
                ['num' => '04', 'icon' => 'fa-box-open',    'title' => 'Deliver',    'desc' => 'GMP-certified manufacturing. Every batch traceable from raw material to can.'],
            ];
            @endphp

            @foreach($steps as $i => $step)
            <div class="relative text-center px-6" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                {{-- Connector line --}}
                @if(!$loop->last)
                <div class="hidden md:block absolute top-10 left-1/2 w-full h-px bg-gradient-to-r from-[#FF6B00] to-[#252525] z-0"></div>
                @endif

                <div class="relative z-10">
                    <div class="w-20 h-20 rounded-full bg-[#111] border-2 border-[#FF6B00] flex items-center justify-center mx-auto mb-5 glow-orange">
                        <i class="fas {{ $step['icon'] }} text-[#FF6B00] text-2xl"></i>
                    </div>
                    <div class="font-bebas text-5xl text-[#1A1A1A] absolute -top-2 left-1/2 -translate-x-1/2 select-none pointer-events-none w-20 text-center">
                        {{ $step['num'] }}
                    </div>
                    <h3 class="font-rajdhani font-700 text-lg mb-2">{{ $step['title'] }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed max-w-[200px] mx-auto">{{ $step['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16 bg-[#0D0D0D] border-y border-[#1A1A1A]">
        <div class="max-w-3xl mx-auto px-5 text-center" data-aos="fade-up">
            <h2 class="font-bebas text-5xl lg:text-6xl mb-5">
                READY TO EXPERIENCE<br><span class="text-gradient">REAL ENERGY?</span>
            </h2>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('products') }}" class="btn-primary"><span>Shop Now</span> <i class="fas fa-arrow-right"></i></a>
                <a href="{{ route('pricing') }}"  class="btn-outline">View Plans</a>
            </div>
        </div>
    </section>

@endsection
