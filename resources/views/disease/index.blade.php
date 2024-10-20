@extends('layouts.sidebar')

@section('main')
    <h1 class="text-center font-semibold text-3xl">Disease's List</h1>
    <a href="{{route('disease.create')}}" class="inline-flex px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-blue-800 mb-3">Add Disease</a>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        @include('layouts.message')
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Disease Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($diseases as $disease)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $loop->iteration }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $disease->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $disease->description }}
                    </td>
                        @if ($disease->status == 1)
                            <td class="px-6 py-4 text-blue-600">
                                Active
                            </td>
                        @else ($disease->status == 0)
                            <td class="px-6 py-4 text-red-600">
                                Inactive
                            </td>
                        @endif
                    <td class="px-6 py-4">
                        {{ $disease->category->name }}
                    </td>
                    <td class="px-6 py-4 flex gap-3">
                        <a href="{{route('disease.edit', $disease->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <form action="{{route('disease.destroy', $disease->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button href="{{route('disease.destroy', $disease->id)}}" class="font-medium text-red-600 dark:text-red-500 hover:underline" onclick="return confirm('Are you sure want to delete the post?')" onclick="return confirm('Are you sure want to delete the post?')" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection