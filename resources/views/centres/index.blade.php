<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Centres</title>
    {{-- Un peu de style pour que ce soit plus joli --}}
    <style>
        body { font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; padding: 2em; line-height: 1.6; }
        h1 { color: #1a202c; }
        ul { list-style-type: none; padding: 0; }
        li { background-color: #f7fafc; border: 1px solid #e2e8f0; border-radius: 0.25rem; margin-bottom: 0.5rem; padding: 0.75rem 1rem; }
        p { color: #718096; }
    </style>
</head>
<body>

    <h1>Liste des Centres</h1>

    {{-- La syntaxe @if ... @else ... @endif est du Blade. C'est comme en Python. --}}
    {{-- On vérifie si la variable $centres (envoyée par le contrôleur) est vide. --}}
    @if($centres->isEmpty())
        <p>Il n'y a aucun centre dans la base de données pour le moment.</p>
    @else
        {{-- Si elle n'est pas vide, on fait une boucle dessus. --}}
        <ul>
            {{-- La syntaxe @foreach est la boucle for de Blade. --}}
            @foreach ($centres as $centre)
                {{-- Les doubles accolades {{ ... }} servent à afficher une variable. --}}
                <li><strong>{{ $centre->code_centre }}</strong> - {{ $centre->nom_centre }}</li>
            @endforeach
        </ul>
    @endif

</body>
</html>