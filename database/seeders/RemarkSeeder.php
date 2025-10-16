<?php

namespace Database\Seeders;

use App\Models\Entity;
use App\Models\Remark;
use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\EntityType;
use App\Enums\EntityTypeEnum;
use Illuminate\Database\Seeder;

class RemarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach (Entity::where('entity_type_id', EntityType::firstWhere('code', EntityTypeEnum::ORGANIZATION)->id)->get() as $entity) {
            Remark::create([
                'label' => "Cas 1 : choc violent (pas épave)",
                'description' => "<p>En raison de la violence du choc subi par le véhicule avec atteintes potentielles à la structure et aux éléments de sécurité, une remise en état ne peut être envisagée qu’après contrôle approfondi rendant toute prévision de réparation prématurée et techniquement incertaine.
                <br>À cet effet, veuillez établir un devis de réparation et nous revenir.</p>",
                'type' => "work-sheet",
                'expert_firm_id' => $entity->id,
                'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
                'created_by' => 1,
                'updated_by' => 1,
            ]);
    
            Remark::create([
                'label' => "Cas 2 : choc violent (épave)",
                'description' => "
                                    <p>Suite à l’expertise réalisée sur le véhicule immatriculée xx123xx, sinistré le 12/07/2025, nous vous informons qu’il nous est impossible de donner avec précision un coût de remise en état dans le cadre de ce dossier.
                                    <br>En effet, les dommages constatés présentent un caractère structurel majeur, rendant l’intervention particulièrement incertaine d’un point de vue technique et économique. Plus précisément :</p>
                                    <ul>
                                        <li>Le véhicule a subi un choc violent avec atteinte probable à la structure (pavillon, longerons, montants) ;</li>
                                        <li>Plusieurs éléments de sécurité sont déclenchés (airbags, capteurs), nécessitant un contrôle approfondi et un recalibrage complexe ;</li>
                                        <li>La réparation ne peut être envisagée qu’à l’issue d’un diagnostic de redressement, voire d’un passage au marbre, et sous réserve d’absence de déformation irréversible ;</li>
                                    </ul>
                                    <p>Dans ce contexte, établir une fiche des travaux à ce stade reviendrait à préjuger de la faisabilité effective de la remise en état. Nous déclarons ce véhicule techniquement et économiquement irréparable (EPAVE).
                                    <br>Veuillez agréer, Monsieur, Madame, l’expression de nos salutations distinguées.</p>
                                ",
                'type' => "work-sheet",
                'expert_firm_id' => $entity->id,
                'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
                'created_by' => 1,
                'updated_by' => 1,
            ]);
    
            Remark::create([
                'label' => "Cas 3 : suivi des travaux",
                'description' => "
                                    <p>Veuillez nous contacter dès l’entame des travaux.
                                    <br>Nous tenons à préciser que l’exécution complète de tout travail de carrosserie sans informer l’expert pour le suivi peut entrainer la non prise en charge des pièces remplacées comme pièces neuves.</p>
                                ",
                'type' => "work-sheet",
                'expert_firm_id' => $entity->id,
                'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
                'created_by' => 1,
                'updated_by' => 1,
            ]);
    
            Remark::create([
                'label' => "Cas 4 : Vétusté",
                'description' => "
                                    <p>La vétusté correspond à la perte de valeur d’une pièce due à l’usure normale, à l’utilisation ou au kilométrage. Les pièces telles que : amortisseurs, pneus, radiateur, moto ventilateur, module, moteur électrique, batterie etc.</p>
                                ",
                'type' => "work-sheet",
                'expert_firm_id' => $entity->id,
                'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
                'created_by' => 1,
                'updated_by' => 1,
            ]);
    
            Remark::create([
                'label' => "Cas 1 : Rapport économiquement irréparable - Le coût de réparation supérieur à la valeur vénale du véhicule",
                'description' => "
                                    <p>En raison de la violence du choc subi par le véhicule avec atteintes potentielles à la structure et aux éléments de sécurité tels que : les airbags, le demi-train, le berceau, etc.
                                    <br>Le cout de la remise en état est supérieur à 80% la valeur vénale du véhicule au jour du sinistre.
                                    <br>En d’autres termes, il est trop cher à réparer par rapport à ce qu’il vaut, même si techniquement il pourrait être remis en état.</p>
                                    <p>Nous proposons l’estimation du préjudice sur les bases suivantes :</p>
                                    <ul>
                                        <li>Valeur vénale avant sinistre</li>
                                        <li>Valeur de sauvetage</li>
                                        <li>Préjudices</li>
                                    </ul>
                                    <p>NB: La valeur de sauvetage est une valeur à dire d’expert. Elle est déterminée selon une estimation des pièces récupérables sur le véhicule sinistré.</p>
                                ",
                'type' => "report",
                'expert_firm_id' => $entity->id,
                'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
                'created_by' => 1,
                'updated_by' => 1,
            ]);
    
            Remark::create([
                'label' => "Cas 2 : Rapport économiquement irréparable - Le coût de réparation est supérieur à la limite du cout de réparation",
                'description' => "
                                    <p>En raison de la violence du choc subi par le véhicule avec atteintes potentielles à la structure et aux éléments de sécurité tels que : les airbags, le demi-train, le berceau, etc.</p>
                                    <br>Le cout de la remise en état serait supérieur à la valeur vénale du véhicule au jour du sinistre.
                                    <br>En d’autres termes, il est trop cher à réparer par rapport à ce qu’il vaut, même si techniquement il pourrait être remis en état.
                                    <p>Nous proposons l’estimation du préjudice sur les bases suivantes :</p>
                                    <ul>
                                        <li>Valeur vénale avant sinistre</li>
                                        <li>Valeur de sauvetage</li>
                                        <li>Préjudices</li>
                                    </ul>
                                    <p>NB: La valeur de sauvetage est une valeur à dire d’expert. Elle est déterminée selon une estimation des pièces récupérables sur le véhicule sinistré.</p>
                                ",
                'type' => "report",
                'expert_firm_id' => $entity->id,
                'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
                'created_by' => 1,
                'updated_by' => 1,
            ]);
    
            Remark::create([
                'label' => "Cas 3 : Rapport économiquement et techniquement irréparable (EPAVE)",
                'description' => "
                                    <p>Pour donner suite à l’expertise réalisée sur le véhicule immatriculé xx123xx, sinistré le 12/05/2025, veuillez trouver nos commentaires :</p>
                                    <ul>
                                        <li>Les dommages constatés présentent un caractère structurel majeur, rendant l’intervention particulièrement incertaine d’un point de vue technique et économique.</li>
                                        <li>Le véhicule a subi un choc violent avec atteinte à la structure (pavillon, longerons, montants etc.) ;</li>
                                        <li>Plusieurs éléments de sécurité sont déclenchés (airbags, capteurs), nécessitant un contrôle approfondi et un recalibrage complexe.</li>
                                    </ul>
                                    <p>Dans ce contexte, nous déclarons ce véhicule techniquement et économiquement irréparable (EPAVE).</p>
                                    <p>Nous proposons l’estimation du préjudice sur les bases suivantes :</p>
                                    <ul>
                                        <li>Valeur vénale avant sinistre</li>
                                        <li>Valeur de sauvetage</li>
                                        <li>Préjudices</li>
                                    </ul>
                                    <p>NB: La valeur de sauvetage est une valeur à dire d’expert. Il est déterminé selon une estimation des pièces récupérables sur le véhicule sinistre.</p>
                                ",
                'type' => "report",
                'expert_firm_id' => $entity->id,
                'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
                'created_by' => 1,
                'updated_by' => 1,
            ]);
        }
    }
}
