<?php

namespace App\Filament\Resources\Penilaians;

use App\Filament\Resources\Penilaians\Pages\CreatePenilaian;
use App\Filament\Resources\Penilaians\Pages\EditPenilaian;
use App\Filament\Resources\Penilaians\Pages\ListPenilaians;
use App\Filament\Resources\Penilaians\Pages\ViewPenilaian;
use App\Filament\Resources\Penilaians\Schemas\PenilaianForm;
use App\Filament\Resources\Penilaians\Schemas\PenilaianInfolist;
use App\Filament\Resources\Penilaians\Tables\PenilaiansTable;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkActionGroup;
use App\Models\Penilaian;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PenilaianResource extends Resource
{
    protected static ?string $model = Penilaian::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Penilaian';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nama')
                    ->label('Nama'),

                TextEntry::make('rating')
                    ->label('Rating')
                    ->formatStateUsing(fn ($state) => str_repeat('★', $state)),

                TextEntry::make('komentar')
                    ->label('Komentar')
                    ->columnSpanFull(),

                TextEntry::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d F Y, H:i'),
            ])
            ->columns(2);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PenilaianInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('rating')
                    ->label('Rating')
                    ->formatStateUsing(function ($state) {
                        return str_repeat('★', $state);
                    })
                    ->sortable(),

                TextColumn::make('komentar')
                    ->label('Komentar')
                    ->limit(100)
                    ->wrap(),

                TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d M Y H:i')
                    ->sortable(),

            ])

            ->recordActions([
                ViewAction::make(),
            ]);
            
    
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPenilaians::route('/'),
            
            'view' => ViewPenilaian::route('/{record}'),
            
        ];
    }
}
