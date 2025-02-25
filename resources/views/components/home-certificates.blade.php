<section class="bg-fixed bg-cover" style="background-image: url('{{ asset('bg-img-8.jpg') }}')">
    <div class="container mx-auto p-4 z-10 pt-20">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-2">
            @foreach ($certifications as $certification)
                <div class="relative m-4 opacity-100 mb-10">
                    <div
                        class="bg-white text-gray-900 transition-shadow rounded-3xl shadow-lg overflow-hidden relative pt-10 min-h-[140px] cursor-pointer">
                        <a
                            href="{{ url('vendor-exam-questions/' . $certification['vendorPerma'] . '/' . $certification['perma']) }}">
                            <div class="p-4 pb-6">
                                <h2 class="text-gray-800 font-bold text-xl text-center">{{ $certification['vendor'] }}
                                </h2>
                                <div class="text-gray-500 font-semibold text-sm text-center">
                                    {{ $certification['name'] }}
                                </div>
                            </div>
                        </a>
                    </div>
                    <div
                        class="absolute top-[-50px] left-1/2 transform -translate-x-1/2 w-24 h-24 rounded-full overflow-hidden">
                        <img src="{{ asset('certs/' . $certification['image']) . '.png' }}"
                            alt="{{ $certification['name'] }}" class="w-full h-full object-cover">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
