<?php

namespace App\Filament\Resources\Penilaians\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PenilaianInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Penilaian')
                    ->schema([
                        TextEntry::make('nama')
                            ->label('Nama'),

                        TextEntry::make('rating')
                            ->label('Rating')
                            ->formatStateUsing(
                                fn ($state) => str_repeat('★', $state)
                            ),

                        TextEntry::make('komentar')
                            ->label('Komentar')
                            ->columnSpanFull(),

                        TextEntry::make('created_at')
                            ->label('Tanggal')
                            ->dateTime('d F Y, H:i'),
                    ])
                    ->columns(2),
            ]);
    }
}
