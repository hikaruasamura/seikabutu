<x-app-layout>
    <h1>アニメブログ</h1>
    <form>
        @csrf
       <h2><a href="{{route('annict.recommendations')}}">今期のアニメ</a></h2>
       <h2><a href="{{route('annict.anime')}}">おすすめアニメ</a></h2>
    </form>
</x-app-layout>
