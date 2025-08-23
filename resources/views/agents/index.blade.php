<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Agents</title>
    <style>
        body { font-family: system-ui, sans-serif; padding: 2em; }
        h1 { color: #1a202c; }
        table { width: 100%; border-collapse: collapse; margin-top: 1em; }
        th, td { border: 1px solid #e2e8f0; padding: 8px 12px; text-align: left; }
        th { background-color: #f7fafc; }
        tr:nth-child(even) { background-color: #f7fafc; }
    </style>
</head>
<body>

    <h1>Liste des Agents</h1>

    <table>
        <thead>
            <tr>
                <th>Trigram</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Centre de rattachement</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($agents as $agent)
                <tr>
                    <td>{{ $agent->trigram }}</td>
                    <td>{{ $agent->nom }}</td>
                    <td>{{ $agent->prenom }}</td>
                    {{-- Ici, on affiche une donnée qui vient de la table 'centres' ! --}}
                    {{-- C'est possible grâce à la relation `centre()` définie dans le modèle Agent. --}}
                    <td>{{ $agent->centre ? $agent->centre->nom_centre : 'Non défini' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Il n'y a aucun agent dans la base de données.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>