@extends('layouts.site')

@section('title', 'Our Projects')
@section('meta_description', 'Explore the solar water pumping, hybrid power and water supply projects Tribute Energy has delivered across Tanzania.')

@section('content')

    {{-- Hero --}}
    <section class="relative pt-20 pb-20 overflow-hidden bg-white">
        <div class="absolute inset-0 opacity-5" style="background: url('{{ asset('hero-bg.jpg') }}') center/cover no-repeat;"></div>
        <div class="relative z-10 max-w-screen-xl mx-auto px-4 lg:px-8 text-center">
            <span class="inline-block px-4 py-1.5 text-xs font-bold tracking-wider uppercase rounded-full mb-5" style="background: #fff7ed; color: #FF8C00; border: 1px solid #ffedd5;">Our Work</span>
            <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 leading-tight mb-5">Projects <span style="background: linear-gradient(90deg,#FFB347,#FF8C00); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Implemented</span></h1>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto leading-relaxed">
                Transforming communities across Tanzania with sustainable energy and water solutions — here's a look at our work on the ground.
            </p>
        </div>
    </section>

    {{-- Projects grid --}}
    <section class="py-20 bg-white">
        <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                $projects = [
                    ['icon' => 'fa-faucet-drip', 'year' => '2023', 'title' => 'Water Projects – Central & Western Tanzania', 'desc' => 'Supply, installation, commissioning and testing of pumps for water projects in Dodoma, Singida, Tabora, Kigoma and Katavi regions.'],
                    ['icon' => 'fa-sun', 'year' => '2020', 'title' => 'Tabora Solar Water Pumping', 'desc' => 'Solar-powered water solutions for Kaliua, Uyui, and Nzega districts under RUWASA, improving rural water access.'],
                    ['icon' => 'fa-droplet', 'year' => '2022', 'title' => 'Southern Tanzania Water Supply', 'desc' => 'Pump supply and installation for water projects in Mtwara, Lindi, Pwani, Ruvuma and Morogoro regions.'],
                    ['icon' => 'fa-people-roof', 'year' => '2021', 'title' => 'Muganza Water Project', 'desc' => 'Clean water access initiative for the Chato-Geita region under RUWASA, improving rural sanitation services.'],
                    ['icon' => 'fa-bolt', 'year' => '2020', 'title' => 'Dar es Salaam Hybrid PV System', 'desc' => 'Hybrid solar power system for a major manufacturing facility, combining renewable with traditional energy sources.'],
                    ['icon' => 'fa-gears', 'year' => '2019', 'title' => 'Lamadi Vertical Multistage Pumps', 'desc' => 'Vertical multistage water pump installation at Lamadi, Mkula - Busega, Simiyu Region for domestic and agricultural use.'],
                    ['icon' => 'fa-hand-holding-heart', 'year' => '2018', 'title' => 'Kigoma Solar Water Pumping', 'desc' => 'Solar water pumping project delivered in partnership with World Vision to improve community water access.'],
                    ['icon' => 'fa-hand-holding-heart', 'year' => '2017', 'title' => 'Karatu Community Water Access', 'desc' => 'Solar-powered borehole pumping project in Karatu, delivered in partnership with World Vision.'],
                    ['icon' => 'fa-hand-holding-heart', 'year' => '2016', 'title' => 'Hedaru Water & Power Project', 'desc' => 'Combined solar pumping and power initiative supporting rural households and schools in Hedaru.'],
                ];
                @endphp
                @foreach($projects as $p)
                <div class="bg-white rounded-2xl p-6 border border-gray-100 hover:border-orange-200 transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                    <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-4" style="background: linear-gradient(135deg, #fff7ed, #ffedd5);">
                        <i class="fas {{ $p['icon'] }}" style="color: #FF8C00;"></i>
                    </div>
                    <span class="text-xs font-semibold text-orange-600 mb-2 block">{{ $p['year'] }}</span>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $p['title'] }}</h3>
                    <p class="text-gray-600 text-sm">{{ $p['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Stats --}}
    <section class="py-16 bg-gray-50 border-y border-gray-100">
        <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                @php $stats = [['9+','Major Projects'],['7','Regions Reached'],['2','Key NGO Partners'],['15+','Years in the Field']]; @endphp
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
    <section class="py-16 bg-white">
        <div class="max-w-3xl mx-auto px-4 text-center">
            <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-5">Have a project in mind?</h2>
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-xl font-semibold text-white transition-all hover:-translate-y-0.5 hover:shadow-xl" style="background: linear-gradient(135deg, #FF8C00, #FF6B00);">Start a Conversation <i class="fas fa-arrow-right"></i></a>
        </div>
    </section>

@endsection
