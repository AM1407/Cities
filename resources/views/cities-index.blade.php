<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cities Explorer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --bg-color: #f8f9fa;
            --card-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        body {
            background: var(--bg-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar {
            background: var(--primary-gradient) !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: white !important;
        }

        .page-header {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 800;
            margin-bottom: 2rem;
        }

        .cities-card {
            background: white;
            border-radius: 15px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: var(--primary-gradient);
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            border: none;
            padding: 1rem 0.75rem;
        }

        .table tbody tr {
            transition: all 0.3s ease;
            border-bottom: 1px solid #eee;
        }

        .table tbody tr:hover {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
            transform: translateX(5px);
        }

        .table tbody td {
            vertical-align: middle;
            padding: 1rem 0.75rem;
            color: #495057;
        }

        .continent-link {
            color: #667eea;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            padding: 0.25rem 0.5rem;
            border-radius: 5px;
        }

        .continent-link:hover {
            background: #667eea;
            color: white;
        }

        .btn-view {
            background: var(--primary-gradient);
            border: none;
            color: white;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-view:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            color: white;
        }

        .btn-tourist {
            background: var(--secondary-gradient);
            border: none;
            color: white;
            font-weight: 600;
            padding: 0.5rem 1.25rem;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .btn-tourist:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(245, 87, 108, 0.4);
            color: white;
        }

        .tourist-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            background: linear-gradient(135deg, #11998e 0%, #38ef3d 100%);
            color: white;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .population-number {
            font-family: 'Courier New', monospace;
            font-weight: 600;
            color: #667eea;
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #6c757d;
        }

        .empty-state i {
            font-size: 4rem;
            opacity: 0.5;
            margin-bottom: 1rem;
        }

        .action-buttons {
            display: flex;
            gapap: 0.5rem;
            align-items: center;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-dark px-4">
    <a class="navbar-brand" href="{{ route('cities.index') }}">
        <i class="bi bi-globe me-2"></i>Cities Explorer
    </a>
    <a href="{{ route('cities.top_tourist') }}" class="btn btn-tourist">
        <i class="bi bi-star-fill me-1"></i>Top Destinations
    </a>
</nav>

<div class="container mt-5">
    <h1 class="page-header">
        <i class="bi bi-map me-2"></i>Explore Cities
    </h1>

    <div class="cities-card">
        @if($cities->isEmpty())
            <div class="empty-state">
                <i class="bi bi-geo-alt"></i>
                <h4>No cities found</h4>
                <p>Start by adding some cities to your database.</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th><i class="bi bi-building me-2"></i>Name</th>
                            <th><i class="bi bi-flag me-2"></i>Country</th>
                            <th><i class="bi bi-globe me-2"></i>Continent</th>
                            <th><i class="bi bi-people me-2"></i>Population</th>
                            <th><i class="bi bi-star me-2"></i>Top Tourist</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cities as $city)
                        <tr>
                            <td>
                                <strong>{{ $city->name }}</strong>
                            </td>
                            <td>{{ $city->country }}</td>
                            <td>
                                <a href="{{ route('cities.continent', $city->continent) }}" class="continent-link">
                                    <i class="bi bi-pin-map me-1"></i>{{ $city->continent }}
                                </a>
                            </td>
                            <td class="population-number">{{ number_format($city->population) }}</td>
                            <td>
                                @if($city->top_tourist_destination)
                                    <span class="tourist-badge">
                                        <i class="bi bi-check-circle me-1"></i>Yes
                                    </span>
                                @else
                                    <span class="text-muted">—</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ route('cities.show', $city->id) }}" class="btn btn-view">
                                    <i class="bi bi-eye me-1"></i>View
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
