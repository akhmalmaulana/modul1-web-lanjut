<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Welcome Card --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold">
                        Selamat Datang, {{ Auth::user()->name }}!
                    </h2>
                    <p class="text-gray-600">
                        {{ Auth::user()->email }}
                    </p>
                </div>
            </div>
            
            {{-- Statistics Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                
                {{-- Card Mahasiswa --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-500 rounded-full p-3">
                                <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                    </path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-700">
                                    Total Mahasiswa
                                </h3>
                                <p class="text-3xl font-bold text-blue-600">
                                    {{ $totalMahasiswa }}
                                </p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('mahasiswa.index') }}" 
                               class="text-blue-500 hover:text-blue-700">
                                Lihat Detail →
                            </a>
                        </div>
                    </div>
                </div>
                
                {{-- Card Mata Kuliah --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-500 rounded-full p-3">
                                <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                    </path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-700">
                                    Total Mata Kuliah
                                </h3>
                                <p class="text-3xl font-bold text-green-600">
                                    {{ $totalMatakuliah }}
                                </p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('matakuliah.index') }}" 
                               class="text-green-500 hover:text-green-700">
                                Lihat Detail →
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            
            {{-- Recent Activity --}}
            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">
                        Aktivitas Terbaru
                    </h3>

                    @php
                        $recentMahasiswa = \App\Models\Mahasiswa::with('user')
                            ->latest()
                            ->take(5)
                            ->get();
                    @endphp
                    
                    @if($recentMahasiswa->count() > 0)
                        <ul class="divide-y divide-gray-200">
                            @foreach($recentMahasiswa as $mhs)
                                <li class="py-3">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">
                                                {{ $mhs->nama }} ({{ $mhs->nim }})
                                            </p>
                                            <p class="text-sm text-gray-500">
                                                Diinput oleh: {{ optional($mhs->user)->name ?? 'Unknown' }}
                                            </p>
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ $mhs->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500">
                            Belum ada data mahasiswa.
                        </p>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>