<!-- resources/views/index.blade.php -->

@extends('master')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-4">Welcome to Mind-do!</h1>
    <p class="text-gray-600 mb-8">Efficiently manage your daily activities.</p>

    <div class="grid grid-cols-3 gap-6">
        <a href="{{ route('tasks.index') }}" class="bg-gray-800 text-white rounded-lg p-6 hover:bg-gray-700 transition-colors">
            <h2 class="text-xl font-medium mb-2">Tasks</h2>
            <p>View and manage your tasks.</p>
        </a>
        <a href="{{ route('calendar.index') }}" class="bg-gray-800 text-white rounded-lg p-6 hover:bg-gray-700 transition-colors">
            <h2 class="text-xl font-medium mb-2">Calendar</h2>
            <p>See your scheduled events and appointments.</p>
        </a>
        <a href="{{ route('stats.index') }}" class="bg-gray-800 text-white rounded-lg p-6 hover:bg-gray-700 transition-colors">
            <h2 class="text-xl font-medium mb-2">Statistics</h2>
            <p>Track your productivity and task progress.</p>
        </a>
    </div>
</div>
@endsection