<!-- resources/views/annict/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Recommender</title>
</head>
<body>
    <h1>Anime Recommender</h1>
    <form action="{{ route('recommend') }}" method="post">
        @csrf
        <label for="name">Your Name:</label>
        <input type="text" name="name" required>
        <br>
        <label for="genre">Favorite Genre:</label>
        <input type="text" name="genre" required>
        <br>
        <button type="submit">Get Recommendations</button>
    </form>
</body>
</html>
