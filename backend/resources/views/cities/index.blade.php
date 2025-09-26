@extends('layouts.app')

@section('title','Cities')

@section('content')
<div class="flex justify-between mb-4">
    <h2 class="text-xl font-bold">Cities</h2>
    <a href="{{ route('cities.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">+ Add City</a>
</div>

<table class="min-w-full bg-white rounded shadow">
    <thead class="bg-gray-800 text-white">
        <tr>
            <th class="px-4 py-2">#</th>
            <th class="px-4 py-2">Title</th>
            <th class="px-4 py-2">State</th>
            <th class="px-4 py-2">Status</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cities as $city)
        <tr class="border-b">
            <td class="px-4 py-2">{{ $loop->iteration }}</td>
            <td class="px-4 py-2">{{ $city->title }}</td>
            <td class="px-4 py-2">{{ $state->title }}</td>
            <td class="px-4 py-2">
                <span class="px-2 py-1 rounded {{ $city->status=='active'?'bg-green-500 text-white':'bg-red-500 text-white' }}">
                    {{ ucfirst($city->status) }}
                </span>
            </td>
            <td class="px-4 py-2">
                <a href="{{ route('cities.edit',$city) }}" class="px-3 py-1 bg-yellow-500 text-white rounded">Edit</a>
                <form action="{{ route('cities.destroy',$city) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this city?')">
                    @csrf @method('DELETE')
                    <button class="px-3 py-1 bg-red-600 text-white rounded">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
