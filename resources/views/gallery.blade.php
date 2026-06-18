@extends('layouts.site')

@section('title', 'Project Gallery')

@section('content')
<div class="gallery-page-wrapper bg-[#f8faff] min-h-screen relative overflow-hidden pb-24"
     x-data="{ 
         filter: 'all',
         lightboxOpen: false,
         lightboxImg: '',
         lightboxTitle: '',
         lightboxDesc: '',
         lightboxCategory: '',
         items: [
             @foreach($gallery as $item)
             {
                 id: {{ $item->id }},
                 title: '{{ addslashes($item->title) }}',
                 desc: '{{ addslashes($item->description ?? '') }}',
                 category: '{{ strtolower($item->category) }}',
                 img: '{{ Str::startsWith($item->image, ['http://', 'https://']) ? $item->image : asset($item->image) }}'
             },
             @endforeach
         ],
         get filteredItems() {
             if (this.filter === 'all') return this.items;
             return this.items.filter(item => item.category === this.filter);
         },
         openLightbox(item) {
             this.lightboxImg = item.img;
             this.lightboxTitle = item.title;
             this.lightboxDesc = item.desc;
             this.lightboxCategory = item.category;
             this.lightboxOpen = true;
         }
     }">
    
    {{-- Background Decoration exactly matching landing-features --}}
    <div class="feat-bg-deco" aria-hidden="true">
        <div class="feat-bg-circle feat-bg-circle--1"></div>
        <div class="feat-bg-circle feat-bg-circle--2"></div>
        <div class="feat-bg-grid"></div>
    </div>

    {{-- Header Banner (Dark footer-like style matching Products page header) --}}
    <div class="relative bg-[#0f172a] pt-32 pb-16 overflow-hidden border-b border-[#FF6B00]/10">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(255,107,0,0.1),transparent_50%)]"></div>
        <div class="absolute inset-0 bg-grid-pattern opacity-10"></div>
        
        <div class="max-w-screen-xl mx-auto px-4 lg:px-8 relative z-10 text-center">
            <span class="inline-block text-xs font-bold tracking-[0.2em] text-[#FF8C00] bg-[#FF8C00]/10 border border-[#FF8C00]/20 px-4 py-1.5 rounded-full uppercase mb-4">Tribute Energy Projects</span>
            <h1 class="text-3xl md:text-5xl font-extrabold text-white tracking-tight leading-tight mb-3">
                Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#FF8C00] to-[#FF6B00]">Installation Gallery</span>
            </h1>
            <p class="text-gray-400 text-sm md:text-base max-w-xl mx-auto">Explore high-quality solar setups, borehole pumping irrigation systems, and hybrid batteries configured by our experts across Tanzania.</p>
        </div>
    </div>

    {{-- Filter & Grid Area --}}
    <div class="max-w-screen-xl mx-auto px-4 lg:px-8 py-12 relative z-10">
        
        {{-- Elegant Category-pills filter (Glassmorphism) --}}
        <div class="flex flex-wrap items-center justify-center gap-2 mb-12" data-aos="fade-up">
            <template x-for="cat in ['all', 'installations', 'commercial', 'residential', 'agricultural', 'industrial']">
                <button @click="filter = cat"
                        :class="filter === cat ? 'bg-[#FF8C00] text-white shadow-md shadow-orange-500/20' : 'bg-white text-gray-600 hover:bg-orange-50/50 hover:text-[#FF6B00] border border-gray-200'"
                        class="px-5 py-2.5 rounded-xl font-bold text-xs tracking-wider uppercase transition-all duration-300"
                        x-text="cat === 'all' ? 'All Projects' : cat">
                </button>
            </template>
        </div>

        {{-- Smooth Interactive Grid --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <template x-for="item in filteredItems" :key="item.id">
                <div class="feat-card block group cursor-pointer overflow-hidden p-0 rounded-3xl border border-gray-200 bg-white hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2"
                     @click="openLightbox(item)"
                     data-aos="fade-up">
                    
                    {{-- Image container with nice padding --}}
                    <div class="relative aspect-video w-full overflow-hidden bg-gray-50 border-b border-gray-100 flex items-center justify-center">
                        <img :src="item.img" :alt="item.title" class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105">
                        <div class="absolute inset-0 bg-[#0f172a]/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <span class="px-5 py-2.5 bg-white/95 text-gray-800 font-bold text-xs tracking-wider uppercase rounded-full shadow-lg transform translate-y-3 group-hover:translate-y-0 transition-all duration-300">
                                <i class="fas fa-search-plus text-[#FF8C00] mr-1.5"></i> Expand Image
                            </span>
                        </div>
                    </div>

                    {{-- Description block --}}
                    <div class="p-6">
                        <span class="text-[10px] font-bold tracking-wider text-[#FF8C00] uppercase mb-1 block" x-text="item.category"></span>
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-[#FF6B00] transition-colors leading-tight mb-2" x-text="item.title"></h3>
                        <p class="text-gray-500 text-xs md:text-sm line-clamp-2 leading-relaxed" x-text="item.desc"></p>
                    </div>
                </div>
            </template>
        </div>
    </div>

    {{-- Elegant Immersive Lightbox Modal --}}
    <div x-show="lightboxOpen" 
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/95 backdrop-blur-md"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         x-cloak>
        
        {{-- Close backdrop click --}}
        <div class="absolute inset-0 cursor-zoom-out" @click="lightboxOpen = false"></div>

        <button @click="lightboxOpen = false" class="absolute top-6 right-6 z-10 w-12 h-12 bg-white/10 hover:bg-[#FF8C00] text-white rounded-full flex items-center justify-center transition-colors shadow-lg">
            <i class="fas fa-times text-lg"></i>
        </button>

        <div class="relative max-w-4xl w-full flex flex-col items-center justify-center z-10"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="scale-95 opacity-0"
             x-transition:enter-end="scale-100 opacity-100">
            
            {{-- Image --}}
            <div class="bg-white/5 p-2 rounded-2xl border border-white/10 shadow-2xl overflow-hidden mb-6 max-h-[70vh]">
                <img :src="lightboxImg" :alt="lightboxTitle" class="max-h-[65vh] w-full object-contain rounded-xl">
            </div>

            {{-- Captions --}}
            <div class="text-center max-w-xl">
                <span class="text-[10px] font-bold tracking-[3px] text-[#FF8C00] uppercase mb-1.5 block" x-text="lightboxCategory"></span>
                <h2 class="text-white text-xl md:text-2xl font-bold tracking-tight mb-2" x-text="lightboxTitle"></h2>
                <p class="text-gray-400 text-xs md:text-sm font-normal leading-relaxed" x-text="lightboxDesc"></p>
            </div>
        </div>
    </div>
</div>

<style>
/* Background and Decos matching landing-features */
.feat-bg-deco { position: absolute; inset: 0; pointer-events: none; }
.feat-bg-circle {
    position: absolute;
    border-radius: 50%;
    filter: blur(80px);
    opacity: 0.45;
}
.feat-bg-circle--1 {
    width: 600px; height: 600px;
    top: 100px; right: -150px;
    background: radial-gradient(circle, #fff7ed, #ffedd5);
}
.feat-bg-circle--2 {
    width: 500px; height: 500px;
    bottom: 100px; left: -100px;
    background: radial-gradient(circle, #fef3c7, #fde68a);
}
.feat-bg-grid {
    position: absolute; inset: 0;
    background-image:
        linear-gradient(rgba(255, 140, 0, 0.04) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255, 140, 0, 0.04) 1px, transparent 1px);
    background-size: 40px 40px;
}

.bg-grid-pattern {
    background-image:
        linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
    background-size: 30px 30px;
}

/* Card Element */
.feat-card {
    border: 1.5px solid #e2e8f0;
}
.feat-card:hover {
    border-color: #ffedd5;
}
</style>
@endsection
