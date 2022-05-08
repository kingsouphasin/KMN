<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           This is {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <h3>You are not Admin</h3>
    </div>
</x-app-layout>
