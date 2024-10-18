@extends('layouts.app')

@section('main')

<div class=" flex items-center justify-center  dark:bg-gray-900 mt-12">
    <div class="bg-white rounded-lg shadow dark:border sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700 p-8">
      <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        @include('layouts.message')
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
          Create an account
        </h1>
        <form class="space-y-4 md:space-y-6" action="{{route('account.processRegister')}}" method="POST">
          @csrf
          <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter Your email</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('email') border-red-600 @enderror" placeholder="name@company.com">
            @error('email')
            <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
          </div>
          <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter Your Name</label>
            <input type="name" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name') border-red-600 @enderror" placeholder="example">
            @error('name')
            <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
          </div>
          <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('password') border-red-600 @enderror">
            @error('password')
            <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
          </div>
          <div>
            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('password_confirmation') border-red-600 @enderror">
            @error('password_confirmation')
            <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
          </div>
          <button type="submit" class="w-full text-white bg-blue-500 hover:bg-blue-800  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create an account</button>
          <p class="text-sm font-light text-gray-500 dark:text-gray-400">
            Already have an account? <a href="#" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Login here</a>
          </p>
        </form>
      </div>
    </div>
  </div>
  
@endsection