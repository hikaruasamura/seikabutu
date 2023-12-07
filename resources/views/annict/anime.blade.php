<x-app-layout>
    <div>
    @foreach($works as $work)
        <h3>{{ $work["title"] }}</h3>
    @endforeach
   </div>
</x-app-layout>
