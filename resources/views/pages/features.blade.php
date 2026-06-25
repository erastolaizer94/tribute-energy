@extends('layouts.site')

@section('title', 'Features & Solutions')
@section('meta_description', 'Solar water pumping, hybrid power systems, water supply and rural water solutions delivered by Tribute Energy across Tanzania.')

@section('content')

    {{-- Hero --}}
    <section class="relative pt-20 pb-20 overflow-hidden bg-white">
        <div class="absolute inset-0 opacity-5" style="background: url('{{ asset('hero-bg.jpg') }}') center/cover no-repeat;"></div>
        <div class="relative z-10 max-w-screen-xl mx-auto px-4 lg:px-8 text-center">
            <span class="inline-block px-4 py-1.5 text-xs font-bold tracking-wider uppercase rounded-full mb-5" style="background: #fff7ed; color: #FF8C00; border: 1px solid #ffedd5;">Our Services</span>
            <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 leading-tight mb-5">
                Premier Electromechanical<br><span style="background: linear-gradient(90deg,#FFB347,#FF8C00); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Engineering Services</span>
            </h1>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto leading-relaxed">
                Tribute Energy Limited is a premier electromechanical and engineering solutions provider in Tanzania. We specialize in the design, supply, installation, and optimization of large-scale water supply systems, industrial pumping stations, and smart renewable energy infrastructure.
            </p>
        </div>
    </section>

    {{-- Core Services --}}
    <section class="py-20 bg-white">
        <div class="max-w-screen-xl mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @php
                $features = [
                    ['icon' => 'fa-industry', 'title' => 'Industrial & Municipal Pumping Stations', 'desc' => 'Turnkey engineering solutions for large-scale water distribution. We specialize in the supply, installation, and commissioning of heavy-duty vertical turbine and horizontal split-case pumps, coupled with advanced pipe network configurations.', 'items' => ['Vertical & horizontal split-case pumps', 'Advanced pipe network design', 'Full commissioning & handover']],
                    ['icon' => 'fa-solar-panel', 'title' => 'Smart Solar Water Pumping Systems', 'desc' => 'Sustainable, high-efficiency solar-powered water solutions tailored for community water supply authorities, agricultural irrigation, and NGOs. We integrate permanent magnet brushless technology for maximum daily water output.', 'items' => ['Permanent magnet brushless motors', 'High-efficiency MPPT controllers', 'Community & NGO deployment']],
                    ['icon' => 'fa-microchip', 'title' => 'Automation, VFDs, & Logic Configuration', 'desc' => 'Intelligent control systems featuring high-performance Variable Frequency Drives (VFDs) and Programmable Logic Controllers (PLCs). We deliver precision logic configuration, Modbus TCP/IP communication protocols, and Power Factor Correction (PFC) systems.', 'items' => ['VFD & PLC logic configuration', 'Modbus TCP/IP protocols', 'Power Factor Correction (PFC)']],
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

    {{-- Request a Quote / Consultation Form --}}
    <section class="py-20 bg-white" id="request-quote">
        <div class="max-w-3xl mx-auto px-4 lg:px-8">
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-1.5 text-xs font-bold tracking-wider uppercase rounded-full mb-4" style="background: #fff7ed; color: #FF8C00; border: 1px solid #ffedd5;">Project Inquiry</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">Request a Quote / Consultation</h2>
                <p class="text-gray-600 max-w-xl mx-auto">Tell us about your project. Our engineering team will review your requirements and prepare a detailed technical proposal.</p>
            </div>

            <form action="{{ route('contact') }}" method="POST" class="bg-gray-50 p-8 md:p-10 rounded-2xl border border-gray-100">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name <span class="text-red-500">*</span></label>
                        <input type="text" name="name" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#FF8C00] focus:ring-2 focus:ring-[#FF8C00]/20 outline-none transition-all text-sm" placeholder="John Doe">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Organization</label>
                        <input type="text" name="organization" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#FF8C00] focus:ring-2 focus:ring-[#FF8C00]/20 outline-none transition-all text-sm" placeholder="District Water Authority / Company">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email <span class="text-red-500">*</span></label>
                        <input type="email" name="email" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#FF8C00] focus:ring-2 focus:ring-[#FF8C00]/20 outline-none transition-all text-sm" placeholder="engineer@company.go.tz">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Phone</label>
                        <input type="tel" name="phone" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#FF8C00] focus:ring-2 focus:ring-[#FF8C00]/20 outline-none transition-all text-sm" placeholder="+255 7XX XXX XXX">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Borehole Depth (m)</label>
                        <input type="number" name="borehole_depth" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#FF8C00] focus:ring-2 focus:ring-[#FF8C00]/20 outline-none transition-all text-sm" placeholder="e.g. 120">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Desired Flow Rate (m³/hr)</label>
                        <input type="number" name="flow_rate" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#FF8C00] focus:ring-2 focus:ring-[#FF8C00]/20 outline-none transition-all text-sm" placeholder="e.g. 50">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Power Source</label>
                        <select name="power_source" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#FF8C00] focus:ring-2 focus:ring-[#FF8C00]/20 outline-none transition-all text-sm bg-white">
                            <option value="">Select...</option>
                            <option value="solar">Solar Only</option>
                            <option value="grid">Grid / Grid-Hybrid</option>
                            <option value="generator">Generator Backup</option>
                            <option value="hybrid">Solar + Grid + Gen</option>
                            <option value="unsure">Unsure — Need Assessment</option>
                        </select>
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Project Description <span class="text-red-500">*</span></label>
                    <textarea name="message" rows="5" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#FF8C00] focus:ring-2 focus:ring-[#FF8C00]/20 outline-none transition-all text-sm resize-none" placeholder="Describe your project scope, location, timeline, and any specific equipment or technical requirements..."></textarea>
                </div>

                <div class="flex flex-col sm:flex-row items-center gap-4">
                    <button type="submit" class="w-full sm:w-auto px-8 py-3.5 rounded-xl font-semibold text-white transition-all hover:-translate-y-0.5 hover:shadow-xl" style="background: linear-gradient(135deg, #FF8C00, #FF6B00);">
                        <i class="fas fa-paper-plane mr-2"></i> Submit Project Inquiry
                    </button>
                    <a href="https://wa.me/255787822735?text=Hello+Tribute+Energy,+I+would+like+to+request+a+quote+for+a+project." target="_blank" class="w-full sm:w-auto flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl font-semibold text-[#25D366] border border-[#25D366]/30 hover:bg-[#25D366] hover:text-white transition-all">
                        <i class="fab fa-whatsapp"></i> WhatsApp Us Instead
                    </a>
                </div>
            </form>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16 bg-white">
        <div class="max-w-3xl mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-5">Ready to Start Your Project?</h2>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-xl font-semibold text-white transition-all hover:-translate-y-0.5 hover:shadow-xl" style="background: linear-gradient(135deg, #FF8C00, #FF6B00);">Talk to Our Team <i class="fas fa-arrow-right"></i></a>
                <a href="https://wa.me/255787822735" target="_blank" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-xl font-semibold text-[#25D366] border border-[#25D366]/30 hover:bg-[#25D366] hover:text-white transition-all"><i class="fab fa-whatsapp"></i> WhatsApp</a>
            </div>
        </div>
    </section>

@endsection
