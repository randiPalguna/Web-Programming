<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transactionData = [
            [
                'transaction-id' => '1',
                'user-id-fk' => '1',
                'plant-id-fk' => '1',
                'transaction-date' => '2024-09-13 06:53:37',
            ],
        ];
        \DB::beginTransaction();
        try {
            foreach ($transactionData as $data) {
                Transaction::create($data);
            }
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            throw $e;
        }
    }
}
