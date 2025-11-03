# 📋 Workflow de Gestion des Affectations

Ce document décrit le cycle de vie complet d'une affectation (assignment) dans le système CEA, de sa création à sa clôture.

## 🔄 Diagramme du Workflow

```
┌─────────────┐
│   OPENED    │ ←Ouverture de dossier
└──────┬──────┘
       │
       ↓
┌─────────────┐
│  REALIZED   │ ← Expertise réalisée sur le terrain
└──────┬──────┘
       │
       ↓
┌───────────────────────────────────┐
│ PENDING_FOR_REPAIRER_INVOICE      │ ← En attente de la facture du réparateur
└───────────────┬───────────────────┘
                │
                ↓
┌───────────────────────────────────────────────┐
│ PENDING_FOR_REPAIRER_INVOICE_VALIDATION       │ ← Facture soumise, en attente de validation
└───────────────┬───────────────────────────────┘
                │
                ↓
┌─────────────┐
│ IN_EDITING  │ ← Rapport en cours d'édition
└──────┬──────┘
       │
       ↓
┌─────────────┐
│   EDITED    │ ← Rapport édité et finalisé
└──────┬──────┘
       │
       ↓
┌─────────────┐
│  VALIDATED  │ ← Rapport validé par l'expert et/ou le réparateur
└──────┬──────┘
       │
       ↓
┌─────────────┐
│    PAID     │ ← Paiement effectué
└──────┬──────┘
       │
       ↓
┌─────────────┐
│   CLOSED    │ ← Affectation clôturée
└─────────────┘

États Annexes:
┌─────────────┐
│  CANCELLED  │ ← Affectation annulée (sortie du workflow principal)
└─────────────┘
┌─────────────┐
│  ARCHIVED   │ ← Affectation archivée (stockage long terme)
└─────────────┘
```

## 📊 Description Détaillée des Statuts

### 1. 📝 DRAFT (Brouillon)
**Description:** État initial d'une affectation en cours de création.

**Actions disponibles:**
- ✏️ Éditer les informations de base
- ✅ Passer au statut OPENED
- 🗑️ Supprimer le brouillon

**Acteurs:** Administrateur, Expert Admin

---

### 2. 🚀 OPENED (Ouvert)
**Description:** Affectation créée et assignée à un expert pour intervention.

**Actions disponibles:**
- 👤 Assigner un expert
- 📅 Planifier une visite
- 📸 Ajouter des photos initiales
- ✅ Marquer comme REALIZED après intervention

**Acteurs:** Expert, Expert Admin, Administrateur

**Notifications:**
- 📧 Email à l'expert assigné
- 📧 Email au client/assureur

---

### 3. ✔️ REALIZED (Réalisé)
**Description:** L'expertise a été réalisée sur le terrain, rapport technique complété.

**Actions disponibles:**
- 📊 Ajouter/Modifier les chocs (shocks)
- 💰 Ajouter les coûts
- 👷 Ajouter la main d'œuvre
- 📸 Ajouter photos et documents
- ✅ Passer au statut PENDING_FOR_REPAIRER_INVOICE

**Acteurs:** Expert, Expert Admin

**Données requises:**
- ✓ Points de choc identifiés
- ✓ Photos du véhicule
- ✓ Estimation des réparations

---

### 4. ⏳ PENDING_FOR_REPAIRER_INVOICE (En attente facture réparateur)
**Description:** Expertise terminée, en attente que le réparateur soumette sa facture.

**Actions disponibles:**
- 📄 Le réparateur peut soumettre sa facture
- 📧 Relance automatique du réparateur (après délai)
- 👀 Consulter l'expertise
- ✅ Passer au statut PENDING_FOR_REPAIRER_INVOICE_VALIDATION

**Acteurs:** Réparateur, Expert Admin

**Notifications:**
- 📧 Email au réparateur pour soumettre facture
- ⏰ Rappel automatique après 24-48h

---

### 5. 🔍 PENDING_FOR_REPAIRER_INVOICE_VALIDATION (Validation facture en attente)
**Description:** Facture du réparateur soumise, en attente de validation par l'expert.

**Actions disponibles:**
- ✅ Valider la facture
- ❌ Rejeter la facture (retour à PENDING_FOR_REPAIRER_INVOICE)
- 💬 Demander des modifications
- ✅ Passer au statut IN_EDITING après validation

**Acteurs:** Expert, Expert Admin

**Notifications:**
- 📧 Email à l'expert pour validation
- 📧 Email au réparateur (validation/rejet)

---

### 6. 📝 IN_EDITING (En cours d'édition)
**Description:** Rapport d'expertise en cours d'édition/finalisation.

**Actions disponibles:**
- ✏️ Éditer le rapport final
- 📊 Ajuster les calculs
- 📄 Générer le PDF du rapport
- ✅ Passer au statut EDITED

**Acteurs:** Expert, Expert Admin, Éditeur

**Documents générés:**
- 📄 Rapport d'expertise (PDF)
- 📄 Feuille de travail (PDF)

---

### 7. ✅ EDITED (Édité)
**Description:** Rapport finalisé, prêt pour validation finale.

**Actions disponibles:**
- 👀 Révision du rapport
- ✅ Valider le rapport (passage à VALIDATED)
- ↩️ Retour en IN_EDITING si corrections nécessaires

**Acteurs:** Expert Admin, Validateur

**Vérifications:**
- ✓ Tous les chocs documentés
- ✓ Calculs corrects
- ✓ Photos présentes
- ✓ Rapport PDF généré

---

### 8. 🎯 VALIDATED (Validé)
**Description:** Rapport validé par l'expert et/ou le réparateur. Prêt pour paiement.

**Actions disponibles:**
- 💰 Initier le paiement
- 📄 Télécharger les documents finaux
- 📧 Envoyer le rapport au client/assureur
- ✅ Marquer comme PAID après paiement

**Acteurs:** Expert Admin, Administrateur, Comptable

**Validations requises:**
- ✓ `is_validated_by_expert = 1`
- ✓ `is_validated_by_repairer = 1` (si applicable)

**⚠️ Restrictions:**
- ❌ Plus de modifications des chocs/coûts/main d'œuvre
- ❌ Plus d'ajout de photos

**Notifications:**
- 📧 Email à l'assureur
- 📧 Email au client
- 📧 Email au réparateur

---

### 9. 💳 PAID (Payé)
**Description:** Paiement effectué et confirmé.

**Actions disponibles:**
- 📊 Consulter les détails de paiement
- 📄 Générer facture
- 📄 Générer reçu
- ✅ Clôturer l'affectation (passage à CLOSED)

**Acteurs:** Comptable, Administrateur

**Données requises:**
- ✓ Montant payé
- ✓ Méthode de paiement
- ✓ Date de paiement
- ✓ Référence de paiement

**Documents générés:**
- 📄 Facture (PDF)
- 📄 Reçu de paiement (PDF)

**⚠️ Restrictions:**
- ❌ Aucune modification possible
- ✓ Lecture seule

---

### 10. 🔒 CLOSED (Clôturé)
**Description:** Affectation complètement terminée et clôturée.

**Actions disponibles:**
- 📊 Consulter l'historique complet
- 📄 Télécharger tous les documents
- 📦 Archiver (passage à ARCHIVED)

**Acteurs:** Tous (lecture seule)

**Caractéristiques:**
- 🔒 Immuable - aucune modification possible
- 📊 Utilisé pour statistiques et rapports
- 💾 Conservé pour audit

---

## 🔀 États Annexes

### ❌ CANCELLED (Annulé)
**Description:** Affectation annulée avant sa complétion.

**Raisons possibles:**
- Client a annulé
- Erreur dans la création
- Doublon détecté
- Conditions non remplies

**Actions disponibles:**
- 📊 Consulter l'historique
- 💬 Ajouter raison d'annulation

**Accès depuis:**
- Peut être annulé depuis: DRAFT, OPENED, REALIZED, PENDING_FOR_REPAIRER_INVOICE

**⚠️ Ne peut PAS être annulé depuis:**
- VALIDATED, PAID, CLOSED

---

### 📦 ARCHIVED (Archivé)
**Description:** Affectation archivée pour stockage long terme.

**Quand archiver:**
- ⏰ Après 2 ans de clôture
- 📊 Après analyse complète
- 💾 Pour libérer espace base de données

**Actions disponibles:**
- 📊 Consultation en lecture seule
- 📥 Restauration si nécessaire

---

### 🗑️ DELETED (Supprimé)
**Description:** Affectation supprimée (soft delete).

**Caractéristiques:**
- 🗑️ Marqué comme supprimé mais conservé en base
- 👁️ Invisible dans les listes normales
- 🔄 Peut être restauré si nécessaire

---

## 🎭 États Génériques

### ✅ ACTIVE / ⭕ INACTIVE
**Usage:** Pour les entités référentielles (utilisateurs, types, etc.)

### ✔️ SUCCESS / ❌ FAILED
**Usage:** Pour les opérations asynchrones (jobs, paiements, etc.)

---

## 👥 Permissions par Rôle

### 🔑 System Admin
- ✅ Accès complet à tous les statuts
- ✅ Peut forcer les transitions
- ✅ Peut annuler à tout moment

### 👔 Admin
- ✅ Gestion complète DRAFT → CLOSED
- ✅ Supervision de tous les workflows
- ❌ Restrictions sur PAID (besoin comptable)

### 🔍 Expert Admin
- ✅ DRAFT → VALIDATED
- ✅ Validation des expertises
- ❌ Pas accès paiements

### 👨‍🔧 Expert
- ✅ OPENED → REALIZED → PENDING_FOR_REPAIRER_INVOICE
- ✅ Édition durant IN_EDITING
- ❌ Ne peut pas valider seul

### 🏢 Assureur Admin
- ✅ Consultation OPENED → CLOSED
- ✅ Validation IN_EDITING → VALIDATED
- ❌ Pas de modifications techniques

### 🛠️ Réparateur Admin
- ✅ PENDING_FOR_REPAIRER_INVOICE → PENDING_FOR_REPAIRER_INVOICE_VALIDATION
- ✅ Soumission facture
- ❌ Pas accès autres statuts

### 💰 Comptable
- ✅ VALIDATED → PAID → CLOSED
- ✅ Gestion paiements
- ❌ Pas modifications techniques

---

## ⚙️ Règles de Transition

### 🔒 Transitions Automatiques

```javascript
// Exemple de règles automatiques
if (is_validated_by_expert && is_validated_by_repairer) {
  status = VALIDATED;
}

if (payment_confirmed) {
  status = PAID;
}

// Après 90 jours de PAID
if (days_since_paid > 90) {
  status = CLOSED;
}
```

### ⏪ Retours en Arrière

**Autorisés:**
- IN_EDITING → REALIZED (corrections nécessaires)
- EDITED → IN_EDITING (révisions)
- PENDING_FOR_REPAIRER_INVOICE_VALIDATION → PENDING_FOR_REPAIRER_INVOICE (rejet facture)

**Interdits:**
- PAID → tout autre statut
- CLOSED → tout autre statut
- VALIDATED → statuts antérieurs (sauf cas exceptionnels System Admin)

---

## 🔔 Système de Notifications

### Par Statut

| Statut | Notification | Destinataires |
|--------|--------------|---------------|
| OPENED | 📧 Nouvelle affectation | Expert, Client |
| REALIZED | 📧 Expertise terminée | Admin, Assureur |
| PENDING_FOR_REPAIRER_INVOICE | 📧 Attente facture | Réparateur |
| PENDING_FOR_REPAIRER_INVOICE_VALIDATION | 📧 Facture à valider | Expert |
| VALIDATED | 📧 Rapport validé | Tous |
| PAID | 📧 Paiement confirmé | Comptable, Admin |
| CLOSED | 📧 Dossier clôturé | Tous |

---

## 📊 Indicateurs et Métriques

### KPIs par Statut

```
📈 Temps moyen par statut:
- OPENED → REALIZED: 2-3 jours
- REALIZED → PENDING_FOR_REPAIRER_INVOICE: 1 jour
- PENDING_FOR_REPAIRER_INVOICE → PENDING_FOR_REPAIRER_INVOICE_VALIDATION: 24-48h
- PENDING_FOR_REPAIRER_INVOICE_VALIDATION → IN_EDITING: 1 jour
- IN_EDITING → EDITED: 2-4 heures
- EDITED → VALIDATED: 24 heures
- VALIDATED → PAID: 7-15 jours
- PAID → CLOSED: 1 jour

⏱️ Durée totale moyenne: 15-20 jours
```

### Alertes

- 🔴 Expertise en OPENED depuis > 5 jours
- 🟠 En PENDING_FOR_REPAIRER_INVOICE depuis > 48h
- 🟡 En IN_EDITING depuis > 48h
- 🟢 Workflow normal

---

## 🔧 Maintenance et Anomalies

### Cas d'Erreur

**Affectation bloquée:**
```bash
# Vérifier le statut actuel
SELECT id, reference, status_id, updated_at 
FROM assignments 
WHERE id = ?

# Forcer une transition (System Admin uniquement)
UPDATE assignments 
SET status_id = ?, updated_by = ? 
WHERE id = ?
```

**Réinitialisation de validation:**
```php
// Retour à PENDING_FOR_REPAIRER_INVOICE
$assignment->update([
    'is_validated_by_expert' => 0,
    'is_validated_by_repairer' => 0,
    'status_id' => Status::where('code', StatusEnum::PENDING_FOR_REPAIRER_INVOICE)->first()->id
]);
```

---

## 📝 Notes Importantes

1. **Validation par deux parties:** Pour passer à VALIDATED, nécessite:
   - `is_validated_by_expert = 1`
   - `is_validated_by_repairer = 1`

2. **Modifications verrouillées:** À partir de VALIDATED:
   - ❌ Chocs (shocks)
   - ❌ Travaux (shock_works)
   - ❌ Main d'œuvre (workforces)
   - ❌ Autres coûts (other_costs)
   - ❌ Photos

3. **Régénération PDF:** Automatique à chaque changement jusqu'à VALIDATED

4. **Traçabilité:** Tous les changements de statut sont loggés avec:
   - Utilisateur
   - Date/Heure
   - Statut précédent/nouveau

---

## 🔗 Références

- [StatusEnum.php](app/Enums/StatusEnum.php) - Définition des statuts
- [Assignment Model](app/Models/Assignment.php) - Modèle principal
- [Assignment Controller](app/Http/Controllers/API/AssignmentController.php) - Logique de transition

---

**Version:** 1.0  
**Dernière mise à jour:** 2025-11-03  
**Mainteneur:** Équipe CEA Back-End

