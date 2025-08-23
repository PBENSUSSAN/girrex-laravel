<?php
namespace App\Enums;

enum StatutCyberRisque: string
{
    case OUVERT = 'OUVERT';
    case TRAITE = 'TRAITE';
    case ACCEPTE = 'ACCEPTE';
    case REFUSE = 'REFUSE';
}```

#### **2. Créer le fichier `GraviteCyberRisque.php`**
*   **Emplacement :** `app\Enums\GraviteCyberRisque.php`
*   **Contenu complet à copier-coller :**
```php
<?php
namespace App\Enums;

enum GraviteCyberRisque: string
{
    case FAIBLE = 'FAIBLE';
    case MOYENNE = 'MOYENNE';
    case ELEVEE = 'ELEVEE';
    case CRITIQUE = 'CRITIQUE';
}