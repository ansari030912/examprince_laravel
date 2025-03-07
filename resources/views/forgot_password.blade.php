@extends('layouts.app')

@section('meta_title', 'ExamPrince - Forgot Password')
@section('meta_description',
    'Examprince is a premium provider of Real and Valid Exam Question and Answers of IT
    certification Exams. Pass your certification exam easily with PDF and test engine dumps in 2025.')
@section('meta_robots', 'no-index')
@section('meta_canonical', url()->current())

@section('main-content')
    <section class="py-24 md:py-32 bg-white" style="background-image: url('/pattern-white.png');">
        <div class="container px-4 mx-auto">
            <div class="max-w-sm mx-auto">
                <div class="mb-6 text-center">
                    <h3 class="mb-4 text-2xl md:text-3xl font-bold">
                        Forgot your account
                    </h3>
                    <p class="text-lg text-coolGray-500 font-medium">
                        Enter your email to get a reset verification code.
                    </p>
                </div>

                <!-- Display success message if available -->
                @if (session('message'))
                    <div class="bg-green-100 text-green-700 p-3 mb-4">
                        {{ session('message') }}
                    </div>
                @endif

                <!-- Display validation or API errors -->
                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 p-3 mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('forgot.submit') }}" id="forgotForm">
                    @csrf
                    <div class="mb-6">
                        <label for="email" class="block mb-2 font-medium">Email*</label>
                        <input type="email" name="email" id="email"
                            class="appearance-none block w-full p-3 leading-5 border border-coolGray-200 rounded-lg shadow-md placeholder-coolGray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50"
                            placeholder="email@example.com" value="{{ old('email') }}" required />
                        @error('email')
                            <span style="color: red" class="text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" id="submitButton"
                        class="inline-block py-3 px-7 mb-4 w-full text-base text-green-50 font-medium text-center leading-6 bg-green-500 hover:bg-green-600 focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 rounded-md shadow-sm">
                        Forgot Password
                    </button>
                    <p class="text-center">
                        <span class="text-xs font-medium">
                            Already have an Account?
                        </span>
                        <a class="inline-block text-xs font-medium text-green-500 hover:text-green-600 hover:underline"
                            href="{{ url('/login') }}">
                            Login
                        </a>
                    </p>
                    <p class="text-center">
                        <span class="text-xs font-medium">
                            Don't have an Account?
                        </span>
                        <a class="inline-block text-xs font-medium text-green-500 hover:text-green-600 hover:underline"
                            href="{{ url('/register') }}">
                            Register
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </section>

    <!-- Inline script to show loading state on button submit -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById('forgotForm');
            const submitButton = document.getElementById('submitButton');

            form.addEventListener('submit', function() {
                // Disable the button to prevent multiple submissions
                submitButton.disabled = true;
                // Change the button content to include a spinner and "Loading..."
                submitButton.innerHTML = `<svg class="animate-spin inline -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                                            </svg> Loading...`;
            });
        });
    </script>
@endsection
