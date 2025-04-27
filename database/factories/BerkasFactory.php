<?php

namespace Database\Factories;

use App\Models\Berkas;
use App\Models\User;
use Illuminate\Support\Carbon;
use Spatie\LaravelPdf\Facades\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berkas>
 */
class BerkasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startOfMonth = Carbon::now()->startOfMonth()->setTime(
            $this->faker->numberBetween(0, 11), 0, 0
        );
        $endOfMonth = Carbon::now()->endOfMonth()->setTime(
            $this->faker->numberBetween(13, 23), 0, 0
        );

        $no_berkas = 'RTI-' . Carbon::now()->format('ymd') . '-' . $this->faker->randomNumber(6);
        $nama_customer = $this->faker->name();
        $file_path = 'berkas/' . $nama_customer . '.pdf';
        $tanggal = $this->faker->dateTimeBetween($startOfMonth, $endOfMonth)->format('Y-m-d H:i:s');

        Pdf::view('pdf.invoice', [
            'no_berkas' => $no_berkas,
            'nama_customer' => $nama_customer,
        ])
            ->disk('public')
            ->format('a4')
            ->save($file_path);

        $prev_seq = Berkas::max('seq') ?? 0;
        $seq = $prev_seq + 1;

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'tanggal' => $tanggal,
            'no_berkas' => $no_berkas,
            'nama_customer' => $nama_customer,
            'tipe' => 'pdf',
            'file_path' => $file_path,
            'seq' => $seq,
        ];
    }
}
