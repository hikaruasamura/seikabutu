<x-app-layout>
    @foreach ($animes as $anime)
    <div>
        <h3>{{ $anime["title"] }}</h3>
        <p>{{ $anime['description'] }}</p>
        <!-- 他のアニメ情報を表示 -->
    </div>
    @endforeach
</x-app-layout>