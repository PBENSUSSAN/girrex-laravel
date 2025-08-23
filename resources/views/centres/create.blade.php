<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un nouveau Centre</title>
    <style>
        body { font-family: system-ui, sans-serif; padding: 2em; }
        .form-group { margin-bottom: 1em; }
        label { display: block; margin-bottom: .5em; }
        input[type="text"], input[type="number"] { width: 100%; padding: .5em; border: 1px solid #ccc; border-radius: 4px; }
        button { padding: .7em 1.5em; background-color: #3490dc; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .error { color: #e3342f; font-size: 0.875em; margin-top: .25em; }
    </style>
</head>
<body>

    <h1>Créer un nouveau Centre</h1>

    {{-- Affiche les erreurs de validation s'il y en a --}}
    @if ($errors->any())
        <div style="color: #e3342f; background-color: #fcebea; border: 1px solid #f9acaa; padding: 1em; margin-bottom: 1em;">
            <strong>Oups ! Il y a eu des erreurs :</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Le formulaire pointe vers la route 'centres.store' avec la méthode POST --}}
    <form action="{{ route('centres.store') }}" method="POST">
        @csrf {{-- Protection de sécurité OBLIGATOIRE en Laravel --}}

        <div class="form-group">
            <label for="nom_centre">Nom complet du centre</label>
            <input type="text" name="nom_centre" id="nom_centre" value="{{ old('nom_centre') }}" required>
        </div>

        <div class="form-group">
            <label for="code_centre">Code du centre (ex: IS)</label>
            <input type="text" name="code_centre" id="code_centre" value="{{ old('code_centre') }}" required>
        </div>

        <div class="form-group">
            <label for="nombre_cabines">Nombre de cabines</label>
            <input type="number" name="nombre_cabines" id="nombre_cabines" value="{{ old('nombre_cabines', 1) }}" required>
        </div>

        <div class="form-group">
            <input type="checkbox" name="gere_aps" id="gere_aps" value="1">
            <label for="gere_aps">Gère le flux CAG APS</label>
        </div>

        <div class="form-group">
            <input type="checkbox" name="gere_tour" id="gere_tour" value="1">
            <label for="gere_tour">Gère la position TOUR</label>
        </div>

        <button type="submit">Enregistrer le Centre</button>
    </form>

</body>
</html>