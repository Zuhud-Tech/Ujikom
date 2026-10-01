<?php

namespace App\Filament\Resources\Kegiatans;

use App\Filament\Resources\Kegiatans\Pages\CreateKegiatan;
use App\Filament\Resources\Kegiatans\Pages\EditKegiatan;
use App\Filament\Resources\Kegiatans\Pages\ListKegiatans;
use App\Filament\Resources\Kegiatans\Pages\ViewKegiatan;
use App\Filament\Resources\Kegiatans\Schemas\KegiatanForm;
use App\Filament\Resources\Kegiatans\Schemas\KegiatanInfolist;
use App\Filament\Resources\Kegiatans\Tables\KegiatansTable;
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
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use App\Models\Kegiatan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KegiatanResource extends Resource
{
    protected static ?string $model = Kegiatan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul_kegiatan')
                    ->Label('Judul')
                    ->Placeholder('Masukan Judul')
                    ->required(),
                    

                TextArea::make('deskripsi_kegiatan')
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
                    ->directory('kegiatan')
                    ->visibility('public')
                    ->nullable()
                    ->required(),
                    
            ])
            ->columns(1);
            
    }

    public static function infolist(Schema $schema): Schema
    {
        return KegiatanInfolist::configure($schema);
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


                    TextColumn::make('judul_kegiatan')
                        ->label('Judul')
                        ->searchable(),

                    TextColumn::make('deskripsi_kegiatan')
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
                fn ($record) => KegiatanResource::getUrl('view', [
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
            'index' => ListKegiatans::route('/'),
            'create' => CreateKegiatan::route('/create'),
            'view' => ViewKegiatan::route('/{record}'),
            'edit' => EditKegiatan::route('/{record}/edit'),
        ];
    }
}
