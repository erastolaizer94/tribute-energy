@extends('layouts.site')

@section('title', 'Our Partners')
@section('meta_description', 'Tribute Energy partners with World Vision, RUWASA and the Government of Tanzania to deliver sustainable energy and water projects.')

@section('content')

    {{-- Hero --}}
    <section class="relative pt-20 pb-20 overflow-hidden" style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);">
        <div class="absolute inset-0 opacity-10" style="background: url('{{ asset('hero-bg.jpg') }}') center/cover no-repeat;"></div>
        <div class="relative z-10 max-w-screen-xl mx-auto px-4 lg:px-8 text-center">
            <span class="inline-block px-4 py-1.5 text-xs font-bold tracking-wider uppercase rounded-full mb-5" style="background: rgba(255,140,0,0.15); color: #FF8C00; border: 1px solid rgba(255,140,0,0.3);">Partnerships</span>
            <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-tight mb-5">Key <span style="background: linear-gradient(90deg,#FFB347,#FF8C00); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Partnerships</span></h1>
            <p class="text-gray-300 text-lg max-w-2xl mx-auto leading-relaxed">
                Collaborating with leading organizations to drive sustainable development across Tanzania.
            </p>
        </div>
    </section>

    {{-- Partners grid --}}
    <section class="py-20 bg-white">
        <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @php
                $partners = [
                    ['icon' => 'fa-globe', 'name' => 'World Vision', 'desc' => 'Partnered on multiple solar water pumping projects including Karatu (2017), Kigoma (2018), and Hedaru (2016).'],
                    ['icon' => 'fa-droplet', 'name' => 'RUWASA', 'desc' => 'Rural Water and Sanitation Agency — a long-term partner for rural water supply projects across Tanzania.'],
                    ['icon' => 'fa-landmark', 'name' => 'Government of Tanzania', 'desc' => 'Strategic partner for national water infrastructure and renewable energy initiatives.'],
                ];
                @endphp
                @foreach($partners as $p)
                <div class="p-6 rounded-2xl border border-gray-100 hover:border-orange-200 transition-all duration-300 hover:shadow-lg text-center">
                    <div class="w-16 h-16 rounded-full mx-auto mb-4 flex items-center justify-center" style="background: linear-gradient(135deg, #fff7ed, #ffedd5);">
                        <i class="fas {{ $p['icon'] }} text-2xl" style="color: #FF8C00;"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $p['name'] }}</h3>
                    <p class="text-gray-600 text-sm">{{ $p['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Why partner with us --}}
    <section class="py-20 bg-gray-50">
        <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-1.5 text-xs font-bold tracking-wider uppercase rounded-full mb-4" style="background: #fff7ed; color: #FF8C00; border: 1px solid #ffedd5;">Why Partner With Us</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900">Built for Long-Term Collaboration</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @php
                $reasons = [
                    ['icon' => 'fa-award', 'title' => 'Proven Track Record', 'desc' => '15+ years delivering projects on time and on budget for NGOs and government agencies.'],
                    ['icon' => 'fa-map-location-dot', 'title' => 'National Reach', 'desc' => 'Active project experience across 7+ regions of Tanzania, from Dar es Salaam to Kigoma.'],
                    ['icon' => 'fa-file-contract', 'title' => 'Procurement-Ready', 'desc' => 'Comfortable working within NGO and government tender, reporting and compliance processes.'],
                ];
                @endphp
                @foreach($reasons as $r)
                <div class="bg-white p-6 rounded-2xl border border-gray-100 text-center hover:shadow-lg transition-all">
                    <div class="w-14 h-14 rounded-xl mx-auto mb-4 flex items-center justify-center" style="background: linear-gradient(135deg, #fff7ed, #ffedd5);">
                        <i class="fas {{ $r['icon'] }} text-xl" style="color: #FF8C00;"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">{{ $r['title'] }}</h3>
                    <p class="text-gray-600 text-sm">{{ $r['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16 bg-white">
        <div class="max-w-3xl mx-auto px-4 text-center">
            <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-5">Interested in partnering with Tribute Energy?</h2>
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-xl font-semibold text-white transition-all hover:-translate-y-0.5 hover:shadow-xl" style="background: linear-gradient(135deg, #FF8C00, #FF6B00);">Contact Our Partnerships Team <i class="fas fa-arrow-right"></i></a>
        </div>
    </section>

@endsection
