@extends('layouts.app')

@section('main-content')
    <section class="py-24 md:py-32 bg-white" style="background-image: url('/pattern-white.png');">
        <div class="container px-4 mx-auto">
            <div class="max-w-sm mx-auto">
                <div class="mb-6 text-center">
                    <h3 class="mb-4 text-2xl md:text-3xl font-bold">
                        Setting - Update Password
                    </h3>
                    <p class="text-lg text-coolGray-500 font-medium">
                        Ensure your account is secure
                    </p>
                </div>

                {{-- Display success message --}}
                @if (session('success'))
                    <div class="bg-green-100 text-green-700 p-3 mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Display validation errors --}}
                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 p-3 mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('profile.update_password') }}" id="settingsForm">
                    @csrf
                    <div class="mb-6">
                        <label class="block mb-2 font-medium">Name*</label>
                        <input
                            class="appearance-none block w-full p-3 leading-5 border border-coolGray-200 rounded-lg shadow-md placeholder-coolGray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50"
                            type="text" name="name" disabled value="{{ $user['name'] ?? '' }}" />
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 font-medium">Password*</label>
                        <input
                            class="appearance-none block w-full p-3 leading-5 border border-coolGray-200 rounded-lg shadow-md placeholder-coolGray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50"
                            type="password" name="password" placeholder="Password" />
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 font-medium">Confirm Password*</label>
                        <input
                            class="appearance-none block w-full p-3 leading-5 border border-coolGray-200 rounded-lg shadow-md placeholder-coolGray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50"
                            type="password" name="confirmPassword" placeholder="Confirm Password" />
                    </div>
                    <button
                        id="submitBtn"
                        class="inline-block py-3 px-7 mb-4 cursor-pointer w-full text-base text-green-50 font-medium text-center leading-6 bg-green-500 hover:bg-green-600 focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 rounded-md shadow-sm"
                        type="submit">
                        Update Password
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById('settingsForm');
        const submitBtn = document.getElementById('submitBtn');
        form.addEventListener('submit', function() {
            submitBtn.disabled = true;
            submitBtn.innerHTML = `<svg class="animate-spin inline -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                                     </svg> Loading...`;
        });
    });
</script>
@endpush
