
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://atlas.microsoft.com/sdk/javascript/mapcontrol/2/atlas.min.css" type="text/css">
    <script src="https://atlas.microsoft.com/sdk/javascript/mapcontrol/2/atlas.min.js"></script>
    <script src="https://atlas.microsoft.com/sdk/javascript/service/2/atlas-service.min.js"></script>
    @if (App::environment('local'))
        <link rel="stylesheet" href="{{ asset('website/css/map.css')}}" type="text/css">
        <script src="{{ asset('website/js/map.js')}}"></script>
    @else
        <link rel="stylesheet" href="{{ secure_asset('website/css/map.css')}}" type="text/css">
        <script src="{{ secure_asset('website/js/map.js')}}"></script>
    @endif

</head>
<body>
    <header>
        <span>Tribore Health Emergency Response</span>
    </header>
    <main>
        <div class="searchPanel">
            <div>
                <input id="searchTbx" type="search" placeholder="Find a Hospital" />
                <button id="searchBtn" title="Search"></button>
            </div>
        </div>
        <div id="listPanel"></div>
        <div id="myMap"></div>
        <button id="myLocationBtn" title="My Location"></button>
    </main>

</body>
</html>
