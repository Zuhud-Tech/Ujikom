<?php

namespace App\Filament\Resources\Prestasis;

use App\Filament\Resources\Prestasis\Pages\CreatePrestasi;
use App\Filament\Resources\Prestasis\Pages\EditPrestasi;
use App\Filament\Resources\Prestasis\Pages\ListPrestasis;
use App\Filament\Resources\Prestasis\Pages\ViewPrestasi;
use App\Filament\Resources\Prestasis\Schemas\PrestasiForm;
use App\Filament\Resources\Prestasis\Schemas\PrestasiInfolist;
use App\Filament\Resources\Prestasis\Tables\PrestasisTable;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextArea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Schemas\Components\Grid;
use App\Models\Prestasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PrestasiResource extends Resource
{
    protected static ?string $model = Prestasi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul_prestasi')
                    ->Label('Judul')
                    ->Placeholder('Masukan Judul')
                    ->required(),

                TextArea::make('deskripsi_prestasi')
                    ->Label('Deskripsi')
                    ->Placeholder('Masukan Deskripsi')
                    ->required(),

                DatePicker::make('tanggal')
                    ->label('Tanggal Kegiatan')
                    ->placeholder('Pilih tanggal')
                    ->required(),

                FileUpload::make('gambar')
                    ->label('Gambar')
                    ->image()
                    ->disk('public')
                    ->directory('prestasi')
                    ->visibility('public')
                    ->nullable(),
                    
            ])
            ->columns(1);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PrestasiInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return $table
                ->columns([
                    ImageColumn::make('gambar')
                        ->label('Gambar')
                        ->state(function ($record) {
                            return asset('storage/' . $record->gambar);
                        })
                        ->width(100)
                        ->height(100),

                    TextColumn::make('judul_prestasi')
                        ->label('Judul')
                        ->searchable(),

                    TextColumn::make('deskripsi_prestasi')
                        ->label('Deskripsi')
                        ->limit('50'),

                    TextColumn::make('tanggal')
                        ->label('Tanggal')
                        ->date('d F Y'),
                ])
                ->actions([
                    EditAction::make(),
                    DeleteAction::make()
                ])
                ->paginated(false)

                ->recordUrl(
                fn ($record) => PrestasiResource::getUrl('view', [
                    'record' => $record,
                ])
            );
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
            'index' => ListPrestasis::route('/'),
            'create' => CreatePrestasi::route('/create'),
            'view' => ViewPrestasi::route('/{record}'),
            'edit' => EditPrestasi::route('/{record}/edit'),
        ];
    }
}
