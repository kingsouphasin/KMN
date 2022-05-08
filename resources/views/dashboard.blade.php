<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           This is {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row" style="display:flex; align-items: center; justify-content: space-around;
                width:100%; height: 400px;">
            <div class="col" style="width: 200px; height:50px; background-color: cadetblue; color:white; display:flex; align-items:center;
                    justify-content:center">
                <a class="box1" href="{{route('check-admin')}}">View Information</a>
            </div>
    
        </div>
    </div>
</x-app-layout>
