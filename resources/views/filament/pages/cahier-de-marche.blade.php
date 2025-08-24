<x-filament-panels::page>
    <div class="space-y-4">
        <h2 class="text-lg font-semibold">
            Cahier de Marche du {{ $this->dateAffichee->format('d/m/Y') }}
        </h2>

        {{-- On vérifie s'il y a des vols à afficher --}}
        @if($this->volsDuJour->isEmpty())
            <div class="p-4 text-center text-gray-500 bg-gray-100 rounded-lg">
                Aucun vol planifié pour cette date.
            </div>
        @else
            {{-- S'il y a des vols, on fait une boucle --}}
            <div class="space-y-6">
                @foreach($this->volsDuJour as $vol)
                    <div class="p-4 border border-gray-200 rounded-lg shadow-sm">
                        {{-- Entête du vol --}}
                        <div class="flex justify-between items-center pb-2 mb-2 border-b">
                            <h3 class="text-md font-bold text-primary-600">
                                {{ $vol->indicatif }} ({{ $vol->centre->code_centre }})
                            </h3>
                            <div class="text-sm text-gray-600">
                                {{ \Carbon\Carbon::parse($vol->heure_debut_prevue)->format('H:i') }} - {{ \Carbon\Carbon::parse($vol->heure_fin_reelle)->format('H:i') }}
                            </div>
                        </div>

                        {{-- Liste des agents sur le vol --}}
                        <div>
                            <h4 class="text-sm font-semibold mb-1">Personnel :</h4>
                            @if($vol->saisiesActivites->isEmpty())
                                <p class="text-xs text-gray-500">Aucun agent assigné.</p>
                            @else
                                <ul class="text-sm list-disc list-inside">
                                    @foreach($vol->saisiesActivites as $activite)
                                        <li>
                                            <span class="font-semibold">{{ $activite->agent->trigram ?? 'N/A' }}:</span>
                                            <span>{{ $activite->role->getLabel() }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-filament-panels::page>