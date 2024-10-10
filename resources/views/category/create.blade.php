@extends('layouts.sidebar')

@section('main')
    
<section class="mb-32 mt-10">
    <h3 class="text-3xl font-bold mb-3 text-center">Create Disease Post</h3>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-8">
            <form action="{{route('category.store')}}" method="POST"  class="bg-slate-100 rounded-lg p-8">
                @csrf
                @extends('layouts.message')
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('name') border-red-600 @enderror" placeholder="Type Category name">
                        @error('name')
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-500 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                    Add Category
                </button>
            </form>
        </div>
      </section>
</section>

@endsection