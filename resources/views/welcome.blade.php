@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="max-w-7xl mx-auto px-6 py-20 flex flex-col md:flex-row items-center gap-12">
    <div class="flex-1 space-y-8">
        <span
            class="inline-block px-4 py-1.5 bg-indigo-100 text-indigo-700 rounded-full text-sm font-bold uppercase tracking-wider">#1
            Event Platform</span>
        <h1 class="text-5xl md:text-7xl font-extrabold leading-tight">
            Temukan & Pesan <span class="text-indigo-600">Tiket Event</span> Impianmu.
        </h1>
        <p class="text-lg text-slate-500 max-w-lg leading-relaxed">
            Dari konser musik hingga workshop teknologi, semua ada di genggamanmu. Pesan aman & cepat dengan
            Midtrans.
        </p>
        <div class="flex gap-4">
            <a href="#events"
                class="px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold text-lg shadow-xl shadow-indigo-200 hover:scale-105 transition-transform">
                Mulai Jelajah
            </a>
            <a href="#"
                class="px-8 py-4 border-2 border-slate-200 rounded-2xl font-bold text-lg hover:border-indigo-600 hover:text-indigo-600 transition">
                Cara Pesan
            </a>
        </div>
    </div>
    <div class="flex-1 relative">
        <div
            class="absolute -top-10 -left-10 w-64 h-64 bg-indigo-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob">
        </div>
        <div
            class="absolute -bottom-10 -right-10 w-64 h-64 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000">
        </div>
        <img src="{{ asset('assets/concert.png') }}" alt="Concert"
            class="rounded-[2rem] shadow-2xl relative z-10 w-full object-cover aspect-[4/5] object-center">

        <div class="absolute -bottom-6 -left-6 glass p-6 rounded-2xl shadow-xl z-20 border border-white">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="text-xs text-slate-500 font-bold uppercase">Terverifikasi</p>
                    <p class="font-bold">Pembayaran Aman via Midtrans</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Partners Section -->
<section id="partners" class="max-w-7xl mx-auto px-6 py-20">
    <style>
        .partner-card {
            transition: transform .25s ease, box-shadow .25s ease;
        }

        .partner-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.12);
        }

        .partner-pill {
            min-height: 96px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 2rem;
            background: #f3f6fb;
            border: 1px solid rgba(15, 23, 42, 0.08);
            padding: 1.2rem 1.4rem;
            color: #4b5563;
            font-size: 1.1rem;
            font-weight: 700;
        }
    </style>

    <div class="mb-8 text-center">
        <p class="text-uppercase text-muted mb-2 fs-7 fw-semibold">Partner & Sponsor</p>
        <h2 class="display-6 fw-bold mb-3">Partner Terpercaya</h2>
        <p class="text-muted fs-5 mx-auto" style="max-width: 700px;">
            Didukung oleh perusahaan dan komunitas terpercaya, mitra resmi AmikomEventHub menghadirkan pengalaman acara yang lebih profesional.
        </p>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 g-4">
        @foreach($partners as $partner)
        <div class="col">
            <div class="card partner-card h-100 border-0 rounded-4 bg-white shadow-sm">
                <div class="card-body d-flex align-items-center justify-content-center text-center py-5 px-4">
                    <div class="partner-pill">
                        {{ $partner->name }}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- Events Grid -->
<section id="events" class="max-w-7xl mx-auto px-6 py-20">


    <!-- Judul & Filter Kategori Sejajar -->
    <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-8">
        <div class="text-center md:text-left">
            <h2 class="text-3xl font-extrabold mb-2">Event Terdekat</h2>
            <p class="text-slate-500 font-medium">Jangan sampai ketinggalan acara seru minggu ini!</p>
        </div>
        <!-- Blok Navigasi Filter Kategori -->
        <div class="flex gap-4">
            <a href="/" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded text-black transition">Semua Kategori</a>
            @foreach($categories as $cat)
            <a href="/?category={{ $cat->slug }}"
                class="px-4 py-2 bg-indigo-100 hover:bg-indigo-200 text-indigo-700 rounded shadow-sm transition">
                {{ $cat->name }}
            </a>
            @endforeach
        </div>
    </div>

    <!-- Zona Menampilkan Grid List Event -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($events as $event)
        <div class="group bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-2xl transition-all duration-300 overflow-hidden">
            <div class="relative overflow-hidden aspect-[3/4]">
                <img src="https://placehold.co/200x600" alt="{{ $event->title }}"
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <div
                    class="absolute top-4 left-4 px-3 py-1 bg-white/90 backdrop-blur rounded-lg text-xs font-bold uppercase text-indigo-600">
                    {{ $event->category->name }}
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold mb-2 group-hover:text-indigo-600 transition">{{ $event->title }}</h3>
                <div class="flex items-center gap-2 text-slate-500 text-sm mb-4">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>{{ \Carbon\Carbon::parse($event->date)->format('d-m-Y H:i') }}</span>
                </div>
                <div class="flex justify-between items-center pt-4 border-t">
                    <span class="text-2xl font-black text-indigo-600">Rp {{ number_format($event->price, 0, ',', '.') }}</span>
                    <a href="{{url('event/1')}}"
                        class="px-5 py-2 bg-indigo-50 text-indigo-600 rounded-xl font-bold hover:bg-indigo-600 hover:text-white transition">Lihat
                        Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>


@endsection