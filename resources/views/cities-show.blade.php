<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $city->name }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark px-4">
    <a class="navbar-brand" href="{{ route('cities.index') }}">Cities</a>
</nav>

<div class="container mt-4">
    <a href="{{ route('cities.index') }}" class="btn btn-secondary mb-3">← Back</a>
    <h2>{{ $city->name }}</h2>
    <ul class="list-group">
        <li class="list-group-item"><strong>Country:</strong> {{ $city->country }}</li>
        <li class="list-group-item"><strong>Continent:</strong>
            <a href="{{ route('cities.continent', $city->continent) }}">{{ $city->continent }}</a>
        </li>
        <li class="list-group-item"><strong>Population:</strong> {{ number_format($city->population) }}</li>
        <li class="list-group-item"><strong>Top Tourist Destination:</strong> {{ $city->top_tourist_destination ? 'Yes' : 'No' }}</li>
    </ul>
</div>
</body>
</html>
