<?php

use yii\db\Migration;

class m250608_141412_fill_products_table extends Migration
{
    public function safeUp()
    {
        $this->batchInsert('product', ['code', 'description'], [
            ['P001', 'Toyota Corolla'],
            ['P002', 'Honda Civic'],
            ['P003', 'Ford Focus'],
            ['P004', 'Chevrolet Malibu'],
            ['P005', 'Nissan Altima'],
            ['P006', 'Volkswagen Jetta'],
            ['P007', 'Hyundai Elantra'],
            ['P008', 'Kia Forte'],
            ['P009', 'Subaru Impreza'],
            ['P010', 'Mazda3'],
            ['P011', 'BMW 3 Series'],
            ['P012', 'Mercedes-Benz C-Class'],
            ['P013', 'Audi A4'],
            ['P014', 'Lexus IS'],
            ['P015', 'Jaguar XE'],
            ['P016', 'Volvo S60'],
            ['P017', 'Tesla Model 3'],
            ['P018', 'Porsche 911'],
            ['P019', 'Chevrolet Camaro'],
            ['P020', 'Ford Mustang'],
            ['P021', 'Dodge Charger'],
            ['P022', 'Nissan 370Z'],
            ['P023', 'Toyota Camry'],
            ['P024', 'Honda Accord'],
            ['P025', 'Hyundai Sonata'],
            ['P026', 'Kia Optima'],
            ['P027', 'Volkswagen Passat'],
            ['P028', 'Subaru Legacy'],
            ['P029', 'Mazda6'],
            ['P030', 'Buick Regal'],
            ['P031', 'Chrysler 300'],
            ['P032', 'Infiniti Q50'],
            ['P033', 'Acura TLX'],
            ['P034', 'Genesis G70'],
            ['P035', 'Land Rover Range Rover'],
            ['P036', 'Jeep Grand Cherokee'],
            ['P037', 'Toyota RAV4'],
            ['P038', 'Honda CR-V'],
            ['P039', 'Nissan Rogue'],
            ['P040', 'Ford Escape'],
            ['P041', 'Chevrolet Equinox'],
            ['P042', 'Hyundai Tucson'],
            ['P043', 'Kia Sportage'],
            ['P044', 'Subaru Forester'],
            ['P045', 'Mazda CX-5'],
            ['P046', 'Volkswagen Tiguan'],
            ['P047', 'BMW X3'],
            ['P048', 'Mercedes-Benz GLC'],
            ['P049', 'Audi Q5'],
            ['P050', 'Lexus NX'],
        ]);
    }

    public function safeDown()
    {
        $this->delete('product', ['code' => [
            'P001', 'P002', 'P003', 'P004', 'P005',
            'P006', 'P007', 'P008', 'P009', 'P010',
            'P011', 'P012', 'P013', 'P014', 'P015',
            'P016', 'P017', 'P018', 'P019', 'P020',
            'P021', 'P022', 'P023', 'P024', 'P025',
            'P026', 'P027', 'P028', 'P029', 'P030',
            'P031', 'P032', 'P033', 'P034', 'P035',
            'P036', 'P037', 'P038', 'P039', 'P040',
            'P041', 'P042', 'P043', 'P044', 'P045',
            'P046', 'P047', 'P048', 'P049', 'P050'
        ]]);
    }
}
