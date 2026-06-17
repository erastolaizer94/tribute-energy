@extends('layouts.site')

@section('title', 'Features & Solutions')
@section('meta_description', 'Solar water pumping, hybrid power systems, water supply and rural water solutions delivered by Tribute Energy across Tanzania.')

@section('content')

    {{-- Hero --}}
    <section class="relative pt-20 pb-20 overflow-hidden" style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);">
        <div class="absolute inset-0 opacity-10" style="background: url('{{ asset('hero-bg.jpg') }}') center/cover no-repeat;"></div>
        <div class="relative z-10 max-w-screen-xl mx-auto px-4 lg:px-8 text-center">
            <span class="inline-block px-4 py-1.5 text-xs font-bold tracking-wider uppercase rounded-full mb-5" style="background: rgba(255,140,0,0.15); color: #FF8C00; border: 1px solid rgba(255,140,0,0.3);">What We Do</span>
            <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-tight mb-5">
                Complete Energy &amp;<br><span style="background: linear-gradient(90deg,#FFB347,#FF8C00); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Water Solutions</span>
            </h1>
            <p class="text-gray-300 text-lg max-w-2xl mx-auto leading-relaxed">
                From solar water pumping to hybrid power systems — everything we offer, built on 15+ years of field experience in Tanzania.
            </p>
        </div>
    </section>

    {{-- Core features --}}
    <section class="py-20 bg-white">
        <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                $features = [
                    ['icon' => 'fa-sun', 'title' => 'Solar Water Pumping', 'desc' => 'Reliable solar-powered pumping systems for irrigation and domestic use, bringing clean water access without reliance on the grid.', 'items' => ['Off-grid & hybrid options', 'Low maintenance design', 'Built for rural conditions']],
                    ['icon' => 'fa-bolt', 'title' => 'Hybrid Power Systems', 'desc' => 'Combined solar and grid power solutions that ensure reliable energy supply around the clock for homes and businesses.', 'items' => ['24/7 power reliability', 'Solar + grid failover', 'Scales with demand']],
                    ['icon' => 'fa-faucet-drip', 'title' => 'Water Supply Projects', 'desc' => 'End-to-end water supply solutions including pump supply, installation, commissioning and testing for communities.', 'items' => ['Full project lifecycle', 'Commissioning & testing', 'Regional deployment']],
                    ['icon' => 'fa-screwdriver-wrench', 'title' => 'Installation & Maintenance', 'desc' => 'Professional installation and ongoing maintenance services that keep energy and water systems running for the long term.', 'items' => ['Certified technicians', 'Scheduled maintenance', 'Rapid response support']],
                    ['icon' => 'fa-droplet', 'title' => 'Rural Water Solutions', 'desc' => 'Specialized solutions for rural communities, delivered through partnerships with RUWASA and international NGOs.', 'items' => ['RUWASA partnership', 'NGO collaboration', 'Community-first design']],
                    ['icon' => 'fa-user-tie', 'title' => 'Expert Consultation', 'desc' => '15+ years of experience in renewable energy and water management, providing expert guidance for projects of any scale.', 'items' => ['Site assessments', 'System design', 'Feasibility studies']],
                ];
                @endphp
                @foreach($features as $f)
                <div class="p-7 rounded-2xl border border-gray-100 hover:border-orange-200 hover:shadow-xl transition-all duration-300">
                    <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-5" style="background: linear-gradient(135deg, #fff7ed, #ffedd5);">
                        <i class="fas {{ $f['icon'] }} text-2xl" style="color: #FF8C00;"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $f['title'] }}</h3>
                    <p class="text-gray-600 text-sm leading-relaxed mb-5">{{ $f['desc'] }}</p>
                    <ul class="space-y-2">
                        @foreach($f['items'] as $item)
                        <li class="flex items-center gap-2 text-sm text-gray-700">
                            <span class="w-1.5 h-1.5 rounded-full flex-shrink-0" style="background:#FF6B00;"></span>{{ $item }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Process --}}
    <section class="py-20 bg-gray-50">
        <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-1.5 text-xs font-bold tracking-wider uppercase rounded-full mb-4" style="background: #fff7ed; color: #FF8C00; border: 1px solid #ffedd5;">How We Work</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900">From Assessment to Delivery</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                @php
                $steps = [
                    ['num' => '01', 'icon' => 'fa-magnifying-glass', 'title' => 'Assess', 'desc' => 'Site visit and feasibility study to understand water and energy needs.'],
                    ['num' => '02', 'icon' => 'fa-drafting-compass', 'title' => 'Design', 'desc' => 'Engineers design a system sized to the site and budget.'],
                    ['num' => '03', 'icon' => 'fa-truck', 'title' => 'Install', 'desc' => 'Certified technicians supply, install and commission the system.'],
                    ['num' => '04', 'icon' => 'fa-headset', 'title' => 'Support', 'desc' => 'Ongoing maintenance and support to keep systems running.'],
                ];
                @endphp
                @foreach($steps as $step)
                <div class="bg-white p-6 rounded-2xl border border-gray-100 text-center">
                    <div class="w-16 h-16 rounded-full mx-auto mb-4 flex items-center justify-center" style="background: linear-gradient(135deg, #fff7ed, #ffedd5);">
                        <i class="fas {{ $step['icon'] }} text-xl" style="color: #FF8C00;"></i>
                    </div>
                    <span class="text-xs font-bold text-orange-600">STEP {{ $step['num'] }}</span>
                    <h3 class="font-bold text-gray-900 mt-1 mb-2">{{ $step['title'] }}</h3>
                    <p class="text-gray-600 text-sm">{{ $step['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16 bg-white">
        <div class="max-w-3xl mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-5">Ready to Start Your Project?</h2>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-xl font-semibold text-white transition-all hover:-translate-y-0.5 hover:shadow-xl" style="background: linear-gradient(135deg, #FF8C00, #FF6B00);">Talk to Our Team <i class="fas fa-arrow-right"></i></a>
                <a href="{{ route('pricing') }}" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-xl font-semibold text-gray-700 border border-gray-300 hover:border-orange-300 transition-all">Get a Quote</a>
            </div>
        </div>
    </section>

@endsection
