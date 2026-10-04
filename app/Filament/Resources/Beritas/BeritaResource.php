<?php

namespace App\Filament\Resources\Beritas;

use App\Filament\Resources\Beritas\Pages\CreateBerita;
use App\Filament\Resources\Beritas\Pages\EditBerita;
use App\Filament\Resources\Beritas\Pages\ListBeritas;
use App\Filament\Resources\Beritas\Pages\ViewBerita;
use App\Filament\Resources\Beritas\Schemas\BeritaForm;
use App\Filament\Resources\Beritas\Schemas\BeritaInfolist;
use App\Filament\Resources\Beritas\Tables\BeritasTable;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextArea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use App\Models\Berita;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Berita';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul_berita')
                    ->Label('Judul')
                    ->Placeholder('Masukan Judul')
                    ->required(),
                    

                TextArea::make('deskripsi_berita')
                    ->Label('Deskripsi')
                    ->Placeholder('Masukan Deskripsi')
                    ->required(),
                    

                DatePicker::make('tanggal')
                    ->label('Tanggal Berita')
                    ->placeholder('Pilih tanggal')
                    ->required(),

                FileUpload::make('gambar')
                    ->label('Gambar')
                    ->image()
                    ->disk('public')
                    ->directory('berita')
                    ->visibility('public')
                    ->nullable()
                    ->required(),
                    
            ])
            ->columns(1);
    }

    public static function infolist(Schema $schema): Schema
    {
        return BeritaInfolist::configure($schema);
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


                    TextColumn::make('judul_berita')
                        ->label('Judul')
                        ->searchable(),

                    TextColumn::make('deskripsi_berita')
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
                fn ($record) => BeritaResource::getUrl('view', [
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
            'index' => ListBeritas::route('/'),
            'create' => CreateBerita::route('/create'),
            'view' => ViewBerita::route('/{record}'),
            'edit' => EditBerita::route('/{record}/edit'),
        ];
    }
}
