@extends('layouts.app')

@section('main-content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-6">Login History</h1>

        @if ($paginator->count() > 0)
            @foreach ($paginator as $item)
                <div class="bg-gray-50 p-4 rounded mb-4 flex flex-col md:flex-row justify-between items-center">
                    <div class="flex items-center">
                        <span class="inline-flex w-10 h-12 mr-2 justify-center items-center bg-purple-50 rounded">
                            <svg width="20" height="24" viewBox="0 0 16 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9 12H5C4.73478 12 4.48043 12.1054 4.29289 12.2929C4.10536 12.4804 4 12.7348 4 13C4 13.2652 4.10536 13.5196 4.29289 13.7071C4.48043 13.8946 4.73478 14 5 14H9C9.26522 14 9.51957 13.8946 9.70711 13.7071C9.89464 13.5196 10 13.2652 10 13C10 12.7348 9.89464 12.4804 9.70711 12.2929C9.51957 12.1054 9.26522 12 9 12ZM13 2H11.82C11.6137 1.41645 11.2319 0.910998 10.7271 0.552938C10.2222 0.194879 9.61894 0.00173951 9 0H7C6.38106 0.00173951 5.7778 0.194879 5.27293 0.552938C4.76807 0.910998 4.38631 1.41645 4.18 2H3C2.20435 2 1.44129 2.31607 0.87868 2.87868C0.316071 3.44129 0 4.20435 0 5V17C0 17.7956 0.316071 18.5587 0.87868 19.1213C1.44129 19.6839 2.20435 20 3 20H13C13.7956 20 14.5587 19.6839 15.1213 19.1213C15.6839 18.5587 16 17.7956 16 17V5C16 4.20435 15.6839 3.44129 15.1213 2.87868C14.5587 2.31607 13.7956 2 13 2ZM6 3C6 2.73478 6.10536 2.48043 6.29289 2.29289C6.48043 2.10536 6.73478 2 7 2H9C9.26522 2 9.51957 2.10536 9.70711 2.29289C9.89464 2.48043 10 2.73478 10 3V4H6V3ZM14 17C14 17.2652 13.8946 17.5196 13.7071 17.7071C13.5196 17.8946 13.2652 18 13 18H3C2.73478 18 2.48043 17.8946 2.29289 17.7071C2.10536 17.5196 2 17.2652 2 17V5C2 4.73478 2.10536 4.48043 2.29289 4.29289C2.48043 4.10536 2.73478 4 3 4H4V5C4 5.26522 4.10536 5.51957 4.29289 5.70711C4.48043 5.89464 4.73478 6 5 6H11C11.2652 6 11.51957 5.89464 11.7071 5.70711C11.8946 5.51957 12 5.26522 12 5V4H13C13.2652 4 13.51957 4.10536 13.7071 4.29289C13.8946 4.48043 14 4.73478 14 5V17ZM11 8H5C4.73478 8 4.48043 8.10536 4.29289 8.29289C4.10536 8.48043 4 8.73478 4 9C4 9.26522 4.10536 9.51957 4.29289 9.70711C4.48043 9.89464 4.73478 10 5 10H11C11.2652 10 11.51957 9.89464 11.7071 9.70711C11.8946 9.51957 12 9.26522 12 9C12 8.73478 11.8946 8.48043 11.7071 8.29289C11.51957 8.10536 11.26522 8 11 8Z"
                                    fill="#707087"></path>
                            </svg>
                        </span>
                        <span class="md:font-medium text-blue-500 hover:text-blue-600 hover:underline">
                            {{ $item['ip'] ?? 'N/A' }}
                        </span>
                    </div>
                    <div class="flex md:items-center justify-end gap-2">
                        <span class="text-sm py-1 px-2 bg-indigo-50 text-indigo-500 rounded-full">
                            {{ \Carbon\Carbon::parse($item['date'])->format('M d Y : h:i A') }}
                        </span>
                    </div>
                </div>
            @endforeach
        @else
            <p>No login history found.</p>
        @endif

        <!-- Custom Pagination Styles -->
        <div class="mt-4 bg-white text-gray-600 pagination">
            {{ $paginator->links() }}
        </div>
    </div>

    <!-- Custom CSS for Pagination -->
    <style>
        /* Override default link styles in the pagination container */
        .pagination a {
            background-color: white !important;
            color: gray !important;
            border-color: #d1d5db !important;
            /* Tailwind gray-300 */
        }

        /* Active page style */
        .pagination span[aria-current="page"] {
            background-color: #38a169 !important;
            /* Tailwind green-500 */
            color: white !important;
            border-color: #38a169 !important;
        }
    </style>
@endsection
