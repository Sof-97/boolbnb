<?php

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            "Vista sulla spiaggia",
            "Vista sul mare",
            "Vista sul panorama urbano",
            "Vista sulla baia",
            "Asciugacapelli",
            "Prodotti per la pulizia",
            "Shampoo",
            "Bidet",
            "Acqua calda",
            "Lavatrice",
            "Essenziali",
            "Grucce",
            "Biancheria da letto",
            "Cuscini e coperte extra",
            "Ferro da stiro",
            "Armadio",
            "TV",
            "Culla",
            "Box bebè portatile",
            "Climatizzatore centralizzato",
            "Riscaldamento",
            "Wi-fi",
            "Spazio di lavoro dedicato",
            "Cucina",
            "Frigorifero",
            "Servizi di base per cucinare",
            "Piatti e posate",
            "Freezer",
            "Lavastoviglie",
            "Fornelli",
            "Forno",
            "Macchina del caffè",
            "Calici da vino",
            "Teglia da forno",
            "Tavolo da pranzo",
            "Lungomare",
            "Accesso alla spiaggia",
            "Ingresso privato",
            "Patio o balcone privata",
            "Arredi da esterni",
            "Zona pranzo all'aperto",
            "Parcheggio gratuito in strada",
            "Soggiorni a lungo termine",
            "Self check-in",
            "Cassetta di sicurezza",
            "Security camera",
            "Allarme antincendio",
            "Rilevatore di monossido di carbonio",
        ];

        foreach($services as $service){
            $newService = new Service();
            $newService->name = $service;
            $newService->save();
        }
    }
}
