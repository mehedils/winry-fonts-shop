<?php

namespace App\Filament\Resources\FontResource\Pages;

use App\Filament\Resources\FontResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFont extends EditRecord
{
    protected static string $resource = FontResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $font = $this->record;
        
        // Get current designers and developers
        $data['designers'] = $font->designers()->pluck('contributors.id')->toArray();
        $data['developers'] = $font->developers()->pluck('contributors.id')->toArray();
        
        return $data;
    }

    protected function afterSave(): void
    {
        $font = $this->record;
        
        // Sync designers
        $designers = $this->data['designers'] ?? [];
        $currentDesigners = $font->designers()->pluck('contributors.id')->toArray();
        
        // Remove old designers
        foreach ($currentDesigners as $designerId) {
            if (!in_array($designerId, $designers)) {
                $font->contributors()->detach($designerId);
            }
        }
        
        // Add new designers
        foreach ($designers as $designerId) {
            if (!in_array($designerId, $currentDesigners)) {
                $font->contributors()->attach($designerId, ['role' => 'designer']);
            }
        }
        
        // Sync developers
        $developers = $this->data['developers'] ?? [];
        $currentDevelopers = $font->developers()->pluck('contributors.id')->toArray();
        
        // Remove old developers
        foreach ($currentDevelopers as $developerId) {
            if (!in_array($developerId, $developers)) {
                $font->contributors()->detach($developerId);
            }
        }
        
        // Add new developers
        foreach ($developers as $developerId) {
            if (!in_array($developerId, $currentDevelopers)) {
                $font->contributors()->attach($developerId, ['role' => 'developer']);
            }
        }
    }
}
