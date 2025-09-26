@extends('layouts.app')

@section('title', 'Employees')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h2 class="text-xl font-bold">Employees</h2>
    <button onclick="openCreateModal()" class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow">+ Add Employee</button>
</div>

@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded relative mb-4" role="alert">
  {{ session('success') }}
  <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" onclick="this.parentElement.remove();">×</span>
</div>
@endif

<div class="overflow-x-auto">
<table class="min-w-full bg-white shadow rounded-lg">
    <thead>
        <tr class="bg-gray-800 text-white">
            <th class="px-4 py-2">#</th>
            <th class="px-4 py-2">CNIC</th>
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Email</th>
            <th class="px-4 py-2">City</th>
            <th class="px-4 py-2">Cell No</th>
            <th class="px-4 py-2">Status</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $employee)
        <tr class="border-b">
            <td class="px-4 py-2">{{ $loop->iteration }}</td>
            <td class="px-4 py-2">{{ $employee->cnic }}</td>
            <td class="px-4 py-2">{{ $employee->first_name }} {{ $employee->last_name }}</td>
            <td class="px-4 py-2">{{ $employee->email }}</td>
            <td class="px-4 py-2">{{ $employee->city?->name }}</td>
            <td class="px-4 py-2">{{ $employee->cell_no1 }}</td>
            <td class="px-4 py-2">
                <span class="px-2 py-1 rounded text-white {{ $employee->status=='active'?'bg-green-500':'bg-red-500' }}">
                    {{ ucfirst($employee->status) }}
                </span>
            </td>
            <td class="px-4 py-2">
                <button onclick="openEditModal({{ $employee->id }})" class="px-3 py-1 bg-yellow-500 text-white rounded">Edit</button>
                <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this employee?')">
                    @csrf @method('DELETE')
                    <button class="px-3 py-1 bg-red-600 text-white rounded">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

<div class="mt-4">
    {{ $employees->links() }}
</div>

@include('employees.modal')
@endsection
