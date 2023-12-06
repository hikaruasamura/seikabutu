<x-app-layout>
    <h1>Anime Recommender</h1>
    <form action="{{ route('Animeblog') }}" method="post">
        @csrf
        <label for="name">Your Name:</label>
        <input type="text" name="name" required>
        <br>
        <label for="genre">Favorite Genre:</label>
        <input type="text" name="genre" required>
        <br>
        <button type="submit">Get Recommendations</button>
    </form>
</x-app-layout>
