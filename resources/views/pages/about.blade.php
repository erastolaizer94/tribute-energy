@extends('layouts.site')

@section('title', 'About Us')
@section('meta_description', 'The Tribute Energy story — 15+ years delivering solar water pumping, hybrid power and water supply solutions across Tanzania.')

@section('content')

    {{-- Hero --}}
    <section class="relative pt-20 pb-20 overflow-hidden bg-white">
        <div class="absolute inset-0 opacity-5" style="background: url('{{ asset('hero-bg.jpg') }}') center/cover no-repeat;"></div>
        <div class="relative z-10 max-w-screen-xl mx-auto px-4 lg:px-8 text-center">
            <span class="inline-block px-4 py-1.5 text-xs font-bold tracking-wider uppercase rounded-full mb-5" style="background: #fff7ed; color: #FF8C00; border: 1px solid #ffedd5;">Our Story</span>
            <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 leading-tight mb-5">
                Powering Communities,<br><span style="background: linear-gradient(90deg,#FFB347,#FF8C00); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">One Project at a Time</span>
            </h1>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto leading-relaxed">
                For over 15 years, Tribute Energy has delivered solar water pumping, hybrid power systems
                and water supply solutions to homes, farms and communities across Tanzania.
            </p>
        </div>
    </section>

    {{-- Mission / Vision / Values --}}
    <section class="py-20 bg-white">
        <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @php
                $mvv = [
                    ['icon' => 'fa-bullseye', 'label' => 'Our Mission', 'text' => 'To deliver reliable, affordable renewable energy and water solutions that improve livelihoods for households, farms and institutions across Tanzania.'],
                    ['icon' => 'fa-eye', 'label' => 'Our Vision', 'text' => 'A Tanzania where every community has access to clean energy and safe water, powered by sustainable, locally-supported infrastructure.'],
                    ['icon' => 'fa-handshake-angle', 'label' => 'Our Values', 'text' => 'Integrity in every installation. Transparency with every client. Excellence in every project, from rural boreholes to national infrastructure.'],
                ];
                @endphp
                @foreach($mvv as $v)
                <div class="p-8 rounded-2xl border border-gray-100 hover:border-orange-200 hover:shadow-xl transition-all duration-300 text-center">
                    <div class="w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-5" style="background: linear-gradient(135deg, #fff7ed, #ffedd5);">
                        <i class="fas {{ $v['icon'] }} text-2xl" style="color: #FF8C00;"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">{{ $v['label'] }}</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">{{ $v['text'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Timeline --}}
    <section class="py-20 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 lg:px-8">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-1.5 text-xs font-bold tracking-wider uppercase rounded-full mb-4" style="background: #fff7ed; color: #FF8C00; border: 1px solid #ffedd5;">The Journey</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900">Our Timeline</h2>
            </div>

            @php
            $timeline = [
                ['year' => '2009', 'title' => 'Founded in Dar es Salaam', 'desc' => 'Tribute Energy is established with a focus on solar-powered water pumping for rural communities.'],
                ['year' => '2016', 'title' => 'World Vision Partnership', 'desc' => 'Delivered solar water pumping projects in Hedaru and Karatu in partnership with World Vision.'],
                ['year' => '2018', 'title' => 'RUWASA Collaboration Begins', 'desc' => 'Became a long-term partner of the Rural Water and Sanitation Agency for national water infrastructure.'],
                ['year' => '2019', 'title' => 'Lamadi Pump Installation', 'desc' => 'Installed vertical multistage water pumps for domestic and agricultural use in Busega, Simiyu Region.'],
                ['year' => '2020', 'title' => 'Tabora Solar Expansion', 'desc' => 'Delivered solar water pumping across Kaliua, Uyui, and Nzega districts under RUWASA.'],
                ['year' => '2022-2023', 'title' => 'Nationwide Water Projects', 'desc' => 'Expanded operations to Dodoma, Singida, Tabora, Kigoma, Katavi, Mtwara, Lindi and Morogoro regions.'],
            ];
            @endphp

            <div class="relative">
                <div class="absolute left-4 md:left-1/2 top-0 bottom-0 w-px bg-gray-200"></div>
                @foreach($timeline as $i => $t)
                <div class="relative flex {{ $i % 2 === 0 ? 'md:flex-row' : 'md:flex-row-reverse' }} gap-6 mb-10 items-center">
                    <div class="absolute left-4 md:left-1/2 w-3.5 h-3.5 rounded-full -translate-x-1/2 z-10" style="background: #FF6B00; box-shadow: 0 0 0 4px #fff, 0 0 0 5px #ffedd5;"></div>
                    <div class="{{ $i % 2 === 0 ? 'md:text-right md:pr-14 pl-12 md:pl-0 md:w-1/2' : 'pl-12 md:pl-14 md:w-1/2' }}">
                        <div class="text-2xl font-extrabold" style="color: #FF6B00;">{{ $t['year'] }}</div>
                        <h3 class="font-bold text-gray-900 mt-1 mb-1">{{ $t['title'] }}</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">{{ $t['desc'] }}</p>
                    </div>
                    <div class="hidden md:block md:w-1/2"></div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Stats --}}
    <section class="py-16 bg-white border-y border-gray-100">
        <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                @php $stats = [['15+','Years Experience'],['7','Regions Served'],['World Vision','& RUWASA Partners'],['100%','Client-Focused']]; @endphp
                @foreach($stats as $s)
                <div>
                    <div class="text-3xl md:text-4xl font-extrabold" style="color: #FF6B00;">{{ $s[0] }}</div>
                    <p class="text-gray-500 text-xs font-semibold tracking-wider uppercase mt-2">{{ $s[1] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-20 bg-gray-50">
        <div class="max-w-3xl mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">Let's Build Something That Lasts</h2>
            <p class="text-gray-600 mb-8">Talk to our team about your energy or water project — residential, agricultural, or municipal.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-xl font-semibold text-white transition-all hover:-translate-y-0.5 hover:shadow-xl" style="background: linear-gradient(135deg, #FF8C00, #FF6B00);">Get in Touch <i class="fas fa-arrow-right"></i></a>
                <a href="{{ route('projects') }}" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-xl font-semibold text-gray-700 border border-gray-300 hover:border-orange-300 transition-all">See Our Projects</a>
            </div>
        </div>
    </section>

@endsection
