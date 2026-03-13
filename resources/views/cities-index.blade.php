<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cities</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark px-4">
    <a class="navbar-brand" href="{{ route('cities.index') }}">Cities</a>
    <a href="{{ route('cities.top_tourist') }}" class="btn btn-outline-light btn-sm">Top Tourist Destinations</a>
</nav>

<div class="container mt-4">
    <h2>Cities</h2>
    @if($cities->isEmpty())
        <p>No cities found.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Country</th>
                    <th>Continent</th>
                    <th>Population</th>
                    <th>Top Tourist</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($cities as $city)
                <tr>
                    <td>{{ $city->name }}</td>
                    <td>{{ $city->country }}</td>
                    <td>
                        <a href="{{ route('cities.continent', $city->continent) }}">{{ $city->continent }}</a>
                    </td>
                    <td>{{ number_format($city->population) }}</td>
                    <td>{{ $city->top_tourist_destination ? '✅' : '' }}</td>
                    <td><a href="{{ route('cities.show', $city->id) }}" class="btn btn-sm btn-primary">View</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
</body>
</html>
