<?php

namespace Tests\Feature;

use App\Models\CvModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CvCrudTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        if (! extension_loaded('pdo_sqlite')) {
            $this->markTestSkipped('The pdo_sqlite extension is required for this feature test.');
        }

        parent::setUp();
    }

    public function test_education_can_be_created_edited_and_deleted(): void
    {
        $educationData = [
            'tahun' => '2020 - 2024',
            'instansi' => 'Politeknik Negeri',
            'jurusan' => 'Teknik Informatika',
            'deskripsi' => 'Fokus pada pengembangan aplikasi.',
        ];

        $this->post(route('uts.store'), $educationData)
            ->assertRedirect(route('uts.index'));

        $this->assertDatabaseHas('Portofolio_1176', $educationData);

        $education = CvModel::firstOrFail();

        $this->get(route('uts.edit', $education->id))
            ->assertOk()
            ->assertSee('Politeknik Negeri');

        $updatedData = [...$educationData, 'instansi' => 'Politeknik Riau'];

        $this->put(route('uts.update', $education->id), $updatedData)
            ->assertRedirect(route('uts.index'));

        $this->assertDatabaseHas('Portofolio_1176', [
            'id' => $education->id,
            'instansi' => 'Politeknik Riau',
        ]);

        $this->delete(route('uts.destroy', $education->id))
            ->assertRedirect(route('uts.index'));

        $this->assertDatabaseMissing('Portofolio_1176', ['id' => $education->id]);
    }
}