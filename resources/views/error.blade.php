<!-- resources/views/error.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
</head>
<body>
    <h1>An Error Occurred</h1>
    <p>{{ $message }}</p>
    
    @if(isset($debugMessage))
        <p>Debug Message: {{ $debugMessage }}</p>
    @endif
</body>
</html>
