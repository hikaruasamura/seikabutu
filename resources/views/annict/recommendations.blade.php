<x-app-layout>
    <div>
    @foreach ($works as $work)
        <h3>{{ $work["title"] }}</h3>
        <p>{{ $work['season'] }}</p>
        <!-- 他のアニメ情報を表示 -->
    @endforeach
    </div>
</x-app-layout>