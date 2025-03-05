@extends('layouts.app')

@section('main-content')
    <section class="py-24 md:py-32 bg-white" style="background-image: url('/pattern-white.png');">
        <div class="container px-4 mx-auto">
            <div class="max-w-sm mx-auto">
                <div class="mb-6 text-center">
                    <h3 class="mb-4 text-2xl md:text-3xl font-bold">
                        Join to save progress
                    </h3>
                    <p class="text-lg text-coolGray-500 font-medium">
                        Start your journey with our product
                    </p>
                </div>
                {{-- Display login error (if any) --}}
                @if ($errors->has('login'))
                    <div class="bg-red-100 text-red-700 p-3 mb-4">
                        {{ $errors->first('login') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('login.submit') }}">
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
                    <div class="mb-4">
                        <label for="password" class="block mb-2 font-medium">Password*</label>
                        <input type="password" name="password" id="password"
                            class="appearance-none block w-full p-3 leading-5 border border-coolGray-200 rounded-lg shadow-md placeholder-coolGray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50"
                            placeholder="************" required />
                        @error('password')
                            <span style="color: red" class="text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-wrap items-center justify-end mb-6">
                        <div class="w-full md:w-auto mt-1">
                            <a class="inline-block text-xs font-medium text-green-500 hover:text-green-600"
                                href="{{ url('/forgot-password') }}">
                                Forgot your password?
                            </a>
                        </div>
                    </div>
                    <button type="submit"
                        class="inline-block cursor-pointer py-3 px-7 mb-4 w-full text-base text-green-50 font-medium text-center leading-6 bg-green-500 hover:bg-green-600 focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 rounded-md shadow-sm">
                        Log In
                    </button>
                    <p class="text-center">
                        <span class="text-xs font-medium">
                            Not have an account?
                        </span>
                        <a class="inline-block text-xs font-medium text-green-500 hover:text-green-600 hover:underline"
                            href="{{ url('/register') }}">
                            Register Now
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </section>
@endsection
