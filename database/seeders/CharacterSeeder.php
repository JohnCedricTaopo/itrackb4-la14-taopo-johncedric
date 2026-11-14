<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\Element;
use Illuminate\Database\Seeder;

class CharacterSeeder extends Seeder
{
    public function run(): void
    {
        $anemo = Element::create(['name' => 'Anemo']);
        $cryo = Element::create(['name' => 'Cryo']);
        $electro = Element::create(['name' => 'Electro']);
        $pyro = Element::create(['name' => 'Pyro']);
        $dendro = Element::create(['name' => 'Dendro']);
        $hydro = Element::create(['name' => 'Hydro']);

        $characters = [
            ['name' => 'Traveler', 'element_id' => $anemo->id, 'weapon' => 'Sword', 'rarity' => 5, 'is_playable' => true, 'remarks' => 'The main traveler.'],
            ['name' => 'Sucrose', 'element_id' => $anemo->id, 'weapon' => 'Catalyst', 'rarity' => 4, 'is_playable' => true, 'remarks' => 'An alchemist from Mondstadt.'],
            ['name' => 'Jean', 'element_id' => $anemo->id, 'weapon' => 'Sword', 'rarity' => 5, 'is_playable' => true, 'remarks' => 'The Acting Grand Master.'],
            ['name' => 'Odette', 'element_id' => $cryo->id, 'weapon' => 'Sword', 'rarity' => 5, 'is_playable' => true, 'remarks' => 'A Cryo sword character.'],
            ['name' => 'Sandrone', 'element_id' => $cryo->id, 'weapon' => 'Claymore', 'rarity' => 5, 'is_playable' => true, 'remarks' => 'A powerful Cryo character.'],
            ['name' => 'Kaeya', 'element_id' => $cryo->id, 'weapon' => 'Sword', 'rarity' => 4, 'is_playable' => true, 'remarks' => 'A Cavalry Captain.'],
            ['name' => 'Ganyu', 'element_id' => $cryo->id, 'weapon' => 'Bow', 'rarity' => 5, 'is_playable' => true, 'remarks' => 'A secretary of the Liyue Qixing.'],
            ['name' => 'Raiden Shogun', 'element_id' => $electro->id, 'weapon' => 'Polearm', 'rarity' => 5, 'is_playable' => true, 'remarks' => 'The Electro Archon.'],
            ['name' => 'Lisa', 'element_id' => $electro->id, 'weapon' => 'Catalyst', 'rarity' => 4, 'is_playable' => true, 'remarks' => 'A librarian from Mondstadt.'],
            ['name' => 'Fischl', 'element_id' => $electro->id, 'weapon' => 'Bow', 'rarity' => 4, 'is_playable' => true, 'remarks' => 'An investigator of mysterious origins.'],
            ['name' => 'Cyno', 'element_id' => $electro->id, 'weapon' => 'Polearm', 'rarity' => 5, 'is_playable' => true, 'remarks' => 'The General Mahamatra.'],
            ['name' => 'Bennett', 'element_id' => $pyro->id, 'weapon' => 'Sword', 'rarity' => 4, 'is_playable' => true, 'remarks' => 'A cheerful adventurer.'],
            ['name' => 'Xiangling', 'element_id' => $pyro->id, 'weapon' => 'Polearm', 'rarity' => 4, 'is_playable' => true, 'remarks' => 'A famous chef from Liyue.'],
            ['name' => 'Diluc', 'element_id' => $pyro->id, 'weapon' => 'Claymore', 'rarity' => 5, 'is_playable' => true, 'remarks' => 'The owner of Dawn Winery.'],
            ['name' => 'Klee', 'element_id' => $pyro->id, 'weapon' => 'Catalyst', 'rarity' => 5, 'is_playable' => true, 'remarks' => 'A joyful young adventurer.'],
            ['name' => 'Nahida', 'element_id' => $dendro->id, 'weapon' => 'Catalyst', 'rarity' => 5, 'is_playable' => true, 'remarks' => 'The Dendro Archon.'],
            ['name' => 'Collei', 'element_id' => $dendro->id, 'weapon' => 'Bow', 'rarity' => 4, 'is_playable' => true, 'remarks' => 'A trainee forest ranger.'],
            ['name' => 'Xingqiu', 'element_id' => $hydro->id, 'weapon' => 'Sword', 'rarity' => 4, 'is_playable' => true, 'remarks' => 'A scholar and martial artist.'],
            ['name' => 'Furina', 'element_id' => $hydro->id, 'weapon' => 'Sword', 'rarity' => 5, 'is_playable' => true, 'remarks' => 'A performer from Fontaine.'],
            ['name' => 'Barbara', 'element_id' => $hydro->id, 'weapon' => 'Catalyst', 'rarity' => 4, 'is_playable' => true, 'remarks' => 'A popular idol.'],
            ['name' => 'Mona', 'element_id' => $hydro->id, 'weapon' => 'Catalyst', 'rarity' => 5, 'is_playable' => true, 'remarks' => 'An astrologist of great skill.'],
        ];

        foreach ($characters as $character) {
            Character::create($character);
        }
    }
}