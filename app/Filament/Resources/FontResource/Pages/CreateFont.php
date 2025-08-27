<?php

namespace App\Filament\Resources\FontResource\Pages;

use App\Filament\Resources\FontResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFont extends CreateRecord
{
    protected static string $resource = FontResource::class;

    protected function afterCreate(): void
    {
        $font = $this->record;
        
        // Attach designers
        if ($designers = $this->data['designers'] ?? []) {
            foreach ($designers as $designerId) {
                $font->contributors()->attach($designerId, ['role' => 'designer']);
            }
        }
        
        // Attach developers
        if ($developers = $this->data['developers'] ?? []) {
            foreach ($developers as $developerId) {
                $font->contributors()->attach($developerId, ['role' => 'developer']);
            }
        }
    }
}
