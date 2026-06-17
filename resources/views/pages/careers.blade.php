@extends('layouts.site')

@section('title', 'Careers')
@section('meta_description', 'Join Tribute Energy and help bring solar power and clean water to communities across Tanzania.')

@section('content')

    {{-- Hero --}}
    <section class="relative pt-20 pb-20 overflow-hidden bg-white">
        <div class="absolute inset-0 opacity-5" style="background: url('{{ asset('hero-bg.jpg') }}') center/cover no-repeat;"></div>
        <div class="relative z-10 max-w-screen-xl mx-auto px-4 lg:px-8 text-center">
            <span class="inline-block px-4 py-1.5 text-xs font-bold tracking-wider uppercase rounded-full mb-5" style="background: #fff7ed; color: #FF8C00; border: 1px solid #ffedd5;">Join Our Team</span>
            <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 leading-tight mb-5">Build the Future<br>of <span style="background: linear-gradient(90deg,#FFB347,#FF8C00); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Energy & Water</span></h1>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto leading-relaxed">
                We're looking for engineers, technicians and project coordinators who want to bring clean energy and safe water to communities across Tanzania.
            </p>
        </div>
    </section>

    {{-- Why work here --}}
    <section class="py-20 bg-white">
        <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center mb-20">
                <div>
                    <span class="inline-block px-4 py-1.5 text-xs font-bold tracking-wider uppercase rounded-full mb-4" style="background: #fff7ed; color: #FF8C00; border: 1px solid #ffedd5;">Why Tribute Energy</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-5">Real Projects. Real Impact.</h2>
                    <p class="text-gray-600 leading-relaxed mb-6">
                        Our team works directly on the ground — installing solar pumps in Tabora, commissioning water
                        systems in Kigoma, and supporting national infrastructure with RUWASA. Every project changes
                        how a community lives.
                    </p>
                    <div class="grid grid-cols-2 gap-3">
                        @php $perks = ['Field & Site Allowances','On-the-Job Training','Health Insurance','Performance Bonuses','Career Growth Paths','Modern Equipment']; @endphp
                        @foreach($perks as $p)
                        <div class="flex items-center gap-2 text-sm text-gray-700"><i class="fas fa-circle-check text-xs" style="color:#FF6B00;"></i> {{ $p }}</div>
                        @endforeach
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    @php $nums = [['15+','Years in Business'],['7','Regions Active'],['2','Major NGO Partners'],['100%','Field-Tested Teams']]; @endphp
                    @foreach($nums as $n)
                    <div class="p-6 rounded-2xl border border-gray-100 text-center">
                        <div class="text-3xl font-extrabold" style="color:#FF6B00;">{{ $n[0] }}</div>
                        <p class="text-gray-500 text-xs font-semibold tracking-wider uppercase mt-1">{{ $n[1] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Open positions --}}
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-1.5 text-xs font-bold tracking-wider uppercase rounded-full mb-4" style="background: #fff7ed; color: #FF8C00; border: 1px solid #ffedd5;">Open Positions</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900">Join the Team</h2>
            </div>

            @php
            $positions = [
                ['title' => 'Solar Systems Engineer', 'dept' => 'Engineering', 'loc' => 'Dar es Salaam', 'type' => 'Full-Time'],
                ['title' => 'Water Pump Installation Technician', 'dept' => 'Field Operations', 'loc' => 'Tabora', 'type' => 'Full-Time'],
                ['title' => 'Project Coordinator (RUWASA Projects)', 'dept' => 'Operations', 'loc' => 'Dodoma', 'type' => 'Full-Time'],
                ['title' => 'Procurement & Logistics Officer', 'dept' => 'Supply Chain', 'loc' => 'Dar es Salaam', 'type' => 'Full-Time'],
                ['title' => 'Electrical Maintenance Technician', 'dept' => 'Maintenance', 'loc' => 'Kigoma', 'type' => 'Contract'],
                ['title' => 'Community Liaison Officer', 'dept' => 'Partnerships', 'loc' => 'Mwanza Region', 'type' => 'Full-Time'],
            ];
            @endphp

            <div class="space-y-4">
                @foreach($positions as $p)
                <a href="{{ route('contact') }}" class="flex flex-col sm:flex-row sm:items-center justify-between p-6 gap-4 rounded-2xl border border-gray-100 hover:border-orange-200 hover:shadow-lg transition-all group">
                    <div>
                        <h3 class="font-bold text-gray-900 group-hover:text-orange-600 transition-colors">{{ $p['title'] }}</h3>
                        <div class="flex items-center gap-3 mt-1 text-xs text-gray-500">
                            <span><i class="fas fa-building mr-1"></i>{{ $p['dept'] }}</span>
                            <span><i class="fas fa-location-dot mr-1"></i>{{ $p['loc'] }}</span>
                            <span><i class="fas fa-clock mr-1"></i>{{ $p['type'] }}</span>
                        </div>
                    </div>
                    <span class="text-xs font-bold tracking-wider uppercase" style="color:#FF6B00;">Apply Now <i class="fas fa-arrow-right ml-1"></i></span>
                </a>
                @endforeach
            </div>

            <div class="text-center mt-12 p-8 rounded-2xl bg-gray-50 border border-gray-100">
                <p class="text-gray-600 text-sm">Don't see a role that fits? We're always looking for talented people.</p>
                <a href="mailto:tributenergy@gmail.com" class="font-bold text-sm inline-flex items-center gap-2 mt-2" style="color:#FF6B00;"><i class="fas fa-envelope"></i> tributenergy@gmail.com</a>
            </div>
        </div>
    </section>

@endsection
