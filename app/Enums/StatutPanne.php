<?php
namespace App\Enums;

enum StatutPanne: string
{
    case EN_COURS = 'EN_COURS';
    case RESOLUE = 'RESOLUE';
}```

#### **6. Créer le fichier `TypeEquipement.php`**
*   **Emplacement :** `app\Enums\TypeEquipement.php`
*   **Contenu complet à copier-coller :**
```php
<?php
namespace App\Enums;

enum TypeEquipement: string
{
    case RADIO = 'RADIO';
    case RADAR = 'RADAR';
    case VISU = 'VISU';
    case TELEPHONE = 'TELEPHONIE';
    case INTERPHONE = 'INTERPHONIE';
    case INFRA = 'INFRA';
    case AUTRE = 'AUTRE';
}