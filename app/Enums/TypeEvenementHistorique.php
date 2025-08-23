<?php
namespace App\Enums;

enum TypeEvenementHistorique: string
{
    case CREATION = 'CREATION';
    case MODIFICATION = 'MODIFICATION';
    case ANNULATION = 'ANNULATION';
    case RESOLUTION = 'RESOLUTION';
}```

#### **4. Créer le fichier `CriticitePanne.php`**
*   **Emplacement :** `app\Enums\CriticitePanne.php`
*   **Contenu complet à copier-coller :**
```php
<?php
namespace App\Enums;

enum CriticitePanne: string
{
    case CRITIQUE = 'CRITIQUE';
    case MAJEURE = 'MAJEURE';
    case MINEURE = 'MINEURE';
}