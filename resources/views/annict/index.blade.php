<x-app-layout>
    <h1>アニメブログ</h1>
    <form action="{{ route('Animeblog') }}" method="post">
        @csrf
       <button><h2>おすすめアニメ</h2></button>
       <button><h2>今期のアニメ</h2></button>
    </form>
</x-app-layout>
