<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\WasteRecord;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WasteRecordTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_cannot_access_dashboard(): void
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect('/login');
    }

    public function test_authenticated_user_can_access_dashboard(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);
        $response->assertSee('Bank Sampah Warga');
        $response->assertSee('Pilih Wilayah RW');
    }

    public function test_authenticated_user_can_create_waste_record(): void
    {
        $user = User::factory()->create();

        $payload = [
            'owner_name' => 'Budi Santoso',
            'address_kampung' => 'Kp. Sukamaju No. 10',
            'rt' => 'RT 01',
            'rw' => 'RW 16',
            'village' => 'Desa Sukamaju',
            'district' => 'Cilaku',
            'regency' => 'Kabupaten Cianjur',
            'weigh_date' => '2026-10-28',
            'week_number' => 'Minggu 4',
            'organic_weight' => 4.5,
            'non_organic_weight' => 2.3,
        ];

        $response = $this->actingAs($user)
            ->postJson('/records', $payload);

        $response->assertStatus(201)
            ->assertJson([
                'success' => true,
                'message' => 'Data penimbangan berhasil ditambahkan.',
            ]);

        $this->assertDatabaseHas('waste_records', [
            'owner_name' => 'Budi Santoso',
            'rt' => 'RT 01',
            'rw' => 'RW 16',
            'organic_weight' => 4.5,
            'non_organic_weight' => 2.3,
        ]);
    }

    public function test_authenticated_user_can_update_waste_record(): void
    {
        $user = User::factory()->create();
        $record = WasteRecord::create([
            'user_id' => $user->id,
            'owner_name' => 'Ahmad Subagja',
            'address_kampung' => 'Kp. Sukamaju No. 12',
            'rt' => 'RT 01',
            'rw' => 'RW 16',
            'village' => 'Desa Sukamaju',
            'district' => 'Cilaku',
            'regency' => 'Kabupaten Cianjur',
            'weigh_date' => '2026-10-05',
            'week_number' => 'Minggu 1',
            'organic_weight' => 3.5,
            'non_organic_weight' => 1.2,
        ]);

        $updatePayload = [
            'owner_name' => 'Ahmad Subagja (Diperbarui)',
            'address_kampung' => 'Kp. Sukamaju No. 12B',
            'rt' => 'RT 01',
            'rw' => 'RW 16',
            'village' => 'Desa Sukamaju',
            'district' => 'Cilaku',
            'regency' => 'Kabupaten Cianjur',
            'weigh_date' => '2026-10-05',
            'week_number' => 'Minggu 1',
            'organic_weight' => 5.0,
            'non_organic_weight' => 2.5,
        ];

        $response = $this->actingAs($user)
            ->putJson("/records/{$record->id}", $updatePayload);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Data penimbangan berhasil diperbarui.',
            ]);

        $this->assertDatabaseHas('waste_records', [
            'id' => $record->id,
            'owner_name' => 'Ahmad Subagja (Diperbarui)',
            'organic_weight' => 5.0,
            'non_organic_weight' => 2.5,
        ]);
    }

    public function test_authenticated_user_can_delete_waste_record(): void
    {
        $user = User::factory()->create();
        $record = WasteRecord::create([
            'user_id' => $user->id,
            'owner_name' => 'Hapus Saya',
            'address_kampung' => 'Kp. Sukamaju',
            'rt' => 'RT 01',
            'rw' => 'RW 16',
            'village' => 'Desa Sukamaju',
            'district' => 'Cilaku',
            'regency' => 'Kabupaten Cianjur',
            'weigh_date' => '2026-10-05',
            'week_number' => 'Minggu 1',
            'organic_weight' => 1.0,
            'non_organic_weight' => 1.0,
        ]);

        $response = $this->actingAs($user)
            ->deleteJson("/records/{$record->id}");

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Data penimbangan berhasil dihapus.',
            ]);

        $this->assertDatabaseMissing('waste_records', [
            'id' => $record->id,
        ]);
    }

    public function test_authenticated_user_can_export_csv(): void
    {
        $user = User::factory()->create();
        WasteRecord::create([
            'user_id' => $user->id,
            'owner_name' => 'Ahmad Subagja',
            'address_kampung' => 'Kp. Sukamaju No. 12',
            'rt' => 'RT 01',
            'rw' => 'RW 16',
            'village' => 'Desa Sukamaju',
            'district' => 'Cilaku',
            'regency' => 'Kabupaten Cianjur',
            'weigh_date' => '2026-10-05',
            'week_number' => 'Minggu 1',
            'organic_weight' => 3.5,
            'non_organic_weight' => 1.2,
        ]);

        $response = $this->actingAs($user)
            ->get('/records/export/csv?rw=RW 16&rt=RT 01');

        $response->assertStatus(200);
        $response->assertHeader('content-type', 'text/csv; charset=UTF-8');
        $this->assertStringContainsString('Ahmad Subagja', $response->streamedContent());
    }
}
