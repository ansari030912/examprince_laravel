@extends('layouts.app')

@section('main-content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-6">Download History</h1>

        @if ($paginator->count() > 0)
            @foreach ($paginator as $item)
                <div class="bg-gray-50 p-4 rounded mb-4 flex flex-col md:flex-row justify-between items-center">
                    <div class="mb-2 md:mb-0">
                        <div class="text-green-600 text-lg font-medium">
                            {{ $item['title'] ?? 'No Title' }}
                        </div>
                        <div class="text-blue-600">
                            {{ $item['name'] ?? 'No Name' }}
                        </div>
                        <div style="color: purple;">
                            ({{ $item['type'] ?? 'N/A' }})
                        </div>
                        <div class="text-gray-700">
                            IP: {{ $item['ip'] ?? 'N/A' }}
                        </div>
                    </div>
                    <div class="text-sm text-indigo-500 bg-indigo-50 rounded-full py-1 px-2">
                        {{ \Carbon\Carbon::parse($item['date'])->format('M d Y : h:i A') }}
                    </div>
                </div>
            @endforeach
        @else
            <p>No download history found.</p>
        @endif
        <div class="mt-4 bg-white text-gray-600 pagination">
            {{ $paginator->links() }}
        </div>

        <style>
            /* All non-active pagination links */
            .pagination a {
                background-color: white !important;
                color: gray !important;
                border-color: #d1d5db !important;
                /* Tailwind gray-300 */
            }

            /* Active pagination link */
            .pagination span[aria-current="page"] {
                background-color: #38a169 !important;
                /* Tailwind green-500 */
                color: white !important;
                border-color: #38a169 !important;
            }
        </style>

    </div>
@endsection
