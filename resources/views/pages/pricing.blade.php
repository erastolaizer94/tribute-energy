@extends('layouts.site')

@section('title', 'Get a Quote')
@section('meta_description', 'Request a custom quote for solar water pumping, hybrid power or water supply projects from Tribute Energy.')

@section('content')

    {{-- Hero --}}
    <section class="relative pt-20 pb-16 text-center overflow-hidden bg-white">
        <div class="absolute inset-0 opacity-5" style="background: url('{{ asset('hero-bg.jpg') }}') center/cover no-repeat;"></div>
        <div class="relative z-10 max-w-screen-xl mx-auto px-4 lg:px-8">
            <span class="inline-block px-4 py-1.5 text-xs font-bold tracking-wider uppercase rounded-full mb-5" style="background: #fff7ed; color: #FF8C00; border: 1px solid #ffedd5;">Pricing</span>
            <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 leading-tight mb-5">Get a Quote for<br><span style="background: linear-gradient(90deg,#FFB347,#FF8C00); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Your Project</span></h1>
            <p class="text-gray-600 text-lg max-w-xl mx-auto">
                Every site is different. Tell us about your project and our engineers will put together a tailored proposal — free of charge.
            </p>
        </div>
    </section>

    {{-- Packages --}}
    <section class="py-20 bg-white">
        <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                @php
                $plans = [
                    [
                        'name' => 'Residential', 'sub' => 'Homes & small farms', 'featured' => false,
                        'items' => ['Solar water pumping', 'Single-property assessment', 'Standard installation', 'Email support', '1-year workmanship warranty'],
                    ],
                    [
                        'name' => 'Commercial & Agricultural', 'sub' => 'Most requested', 'featured' => true,
                        'items' => ['Hybrid power systems', 'Irrigation-scale pumping', 'Site survey & system design', 'Priority installation', 'Scheduled maintenance plan', 'Dedicated project manager'],
                    ],
                    [
                        'name' => 'Government & NGO', 'sub' => 'Municipal & rural infrastructure', 'featured' => false,
                        'items' => ['Multi-site water supply', 'Procurement-ready proposals', 'Commissioning & testing', 'RUWASA-aligned reporting', 'Long-term maintenance contracts'],
                    ],
                ];
                @endphp
                @foreach($plans as $plan)
                <div class="relative rounded-2xl border {{ $plan['featured'] ? 'border-orange-300 shadow-xl' : 'border-gray-100' }} flex flex-col bg-white">
                    @if($plan['featured'])
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 text-white text-xs font-bold uppercase tracking-wider px-5 py-1.5 rounded-full whitespace-nowrap" style="background: linear-gradient(135deg, #FF8C00, #FF6B00);">Most Requested</div>
                    @endif
                    <div class="p-7 flex-1">
                        <h3 class="text-xl font-extrabold text-gray-900">{{ $plan['name'] }}</h3>
                        <p class="text-gray-500 text-sm mb-6">{{ $plan['sub'] }}</p>
                        <ul class="space-y-3">
                            @foreach($plan['items'] as $item)
                            <li class="flex items-center gap-3 text-sm text-gray-700">
                                <i class="fas fa-check text-xs flex-shrink-0" style="color:#FF6B00;"></i>{{ $item }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="p-7 pt-0">
                        <a href="{{ route('contact') }}"
                           class="w-full inline-flex items-center justify-center gap-2 py-3 rounded-xl font-semibold transition-all {{ $plan['featured'] ? 'text-white hover:-translate-y-0.5 hover:shadow-lg' : 'text-gray-700 border border-gray-300 hover:border-orange-300' }}"
                           style="{{ $plan['featured'] ? 'background: linear-gradient(135deg, #FF8C00, #FF6B00);' : '' }}">
                            Request a Quote <i class="fas fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- FAQ --}}
    <section class="py-20 bg-gray-50">
        <div class="max-w-3xl mx-auto px-4 lg:px-8">
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-1.5 text-xs font-bold tracking-wider uppercase rounded-full mb-4" style="background: #fff7ed; color: #FF8C00; border: 1px solid #ffedd5;">Got Questions?</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900">Quote FAQ</h2>
            </div>
            @php
            $faqs = [
                ['q' => 'How is a quote calculated?', 'a' => 'Pricing depends on site conditions, water depth or power demand, equipment specification and distance from our regional team. A site assessment lets us give you an accurate figure.'],
                ['q' => 'Is the site assessment free?', 'a' => 'Yes. Initial consultations and feasibility assessments are provided at no cost for residential and commercial enquiries.'],
                ['q' => 'How long does installation take?', 'a' => 'Most residential and small commercial installations are completed within 1-3 weeks. Larger municipal projects are scheduled based on scope.'],
                ['q' => 'Do you offer maintenance plans?', 'a' => 'Yes, all packages can include a scheduled maintenance plan to keep your system performing at its best year-round.'],
                ['q' => 'Do you work with government and NGO partners?', 'a' => 'Yes. We have long-standing partnerships with RUWASA, World Vision, and the Government of Tanzania for rural and national infrastructure projects.'],
            ];
            @endphp
            <div class="space-y-3" x-data="{ open: null }">
                @foreach($faqs as $i => $faq)
                <div class="bg-white rounded-xl border border-gray-100">
                    <button class="w-full flex items-center justify-between p-5 text-left" onclick="this.parentElement.querySelector('.faq-body').classList.toggle('hidden'); this.querySelector('i').classList.toggle('fa-plus'); this.querySelector('i').classList.toggle('fa-minus');">
                        <span class="font-bold text-gray-900 text-base pr-4">{{ $faq['q'] }}</span>
                        <i class="fas fa-plus flex-shrink-0" style="color:#FF6B00;"></i>
                    </button>
                    <div class="faq-body hidden px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-4">{{ $faq['a'] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16 bg-white">
        <div class="max-w-3xl mx-auto px-4 text-center">
            <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-5">Not sure which package fits?</h2>
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-xl font-semibold text-white transition-all hover:-translate-y-0.5 hover:shadow-xl" style="background: linear-gradient(135deg, #FF8C00, #FF6B00);">Talk to Our Team <i class="fas fa-arrow-right"></i></a>
        </div>
    </section>

@endsection
