@extends('layouts.app')

@section('main-content')
    <section class="py-24 md:py-32 bg-white" style="background-image: url('/pattern-white.png');">
        <div class="container px-4 mx-auto">
            <div class="max-w-sm mx-auto">
                <div class="mb-6 text-center">
                    <h3 class="mb-4 text-2xl md:text-3xl font-bold">Join to save progress</h3>
                    <p class="text-lg text-coolGray-500 font-medium">Start your journey with our product</p>
                </div>

                {{-- Success Message --}}
                @if (session('success'))
                    <div class="bg-green-100 text-green-700 p-3 mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Registration Error Message --}}
                @if ($errors->has('register'))
                    <div class="bg-red-100 text-red-700 p-3 mb-4">
                        {{ $errors->first('register') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('register.submit') }}">
                    @csrf
                    <div class="mb-6">
                        <label for="name" class="block mb-2 font-medium">Name*</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="appearance-none block w-full p-3 leading-5 border border-coolGray-200 rounded-lg shadow-md placeholder-coolGray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50"
                            required>
                        @error('name')
                            <span style="color: red" class="text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 font-medium">Email*</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            placeholder="email@example.com"
                            class="appearance-none block w-full p-3 leading-5 border border-coolGray-200 rounded-lg shadow-md placeholder-coolGray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50"
                            required>
                        @error('email')
                            <span style="color: red" class="text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block mb-2 font-medium">Password*</label>
                        <input type="password" name="password" id="password" placeholder="************"
                            class="appearance-none block w-full p-3 leading-5 text-coolGray-900 border border-coolGray-200 rounded-lg shadow-md placeholder-coolGray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50"
                            required>
                        @error('password')
                            <span style="color: red" class="text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="confirm_password" class="block mb-2 font-medium">Confirm Password*</label>
                        <input type="password" name="confirm_password" id="confirm_password" placeholder="************"
                            class="appearance-none block w-full p-3 leading-5 text-coolGray-900 border border-coolGray-200 rounded-lg shadow-md placeholder-coolGray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50"
                            required>
                        @error('confirm_password')
                            <span style="color: red" class="text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-wrap items-center justify-end mb-2">
                        {{-- Additional elements or terms can be added here if needed --}}
                    </div>
                    <hr class="my-3" />
                    <div class="w-full p-2 -mt-2">
                        {{-- This area can display a generic error if any field is missing --}}
                        @if (
                            $errors->any() &&
                                !$errors->has('name') &&
                                !$errors->has('email') &&
                                !$errors->has('password') &&
                                !$errors->has('confirm_password'))
                            <span style="color: red" class="text-sm">All fields are required...</span>
                        @endif
                    </div>
                    <button type="submit"
                        class="inline-block py-3 px-7 mb-4 cursor-pointer w-full text-base text-green-50 font-medium text-center leading-6 bg-green-500 hover:bg-green-600 focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 rounded-md shadow-sm">
                        Register
                    </button>
                    <p class="text-center">
                        <span class="text-base font-medium">Already have an account?</span>
                        <a class="inline-block text-base font-medium text-green-500 hover:text-green-600 hover:underline"
                            href="{{ url('/login') }}">
                            Login
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </section>
@endsection
