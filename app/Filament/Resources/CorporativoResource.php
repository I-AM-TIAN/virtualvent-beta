<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CorporativoResource\Pages;
use App\Filament\Resources\CorporativoResource\RelationManagers;
use App\Models\Ciudad;
use App\Models\Corporativo;
use App\Models\Departamento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Symfony\Contracts\Service\Attribute\Required;

use function Laravel\Prompts\search;

class CorporativoResource extends Resource
{
    protected static ?string $model = Corporativo::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Información de la empresa')
                    ->schema([
                        Forms\Components\TextInput::make('nit')
                            ->required()
                            ->unique(Corporativo::class, 'nit', fn ($record) => $record),
                        Forms\Components\TextInput::make('razon_social')
                            ->required(),
                        Forms\Components\TextInput::make('email')
                            ->label('Correo Electrónico')
                            ->email()
                            ->required()
                            ->unique(Corporativo::class, 'email', fn ($record) => $record),
                        Forms\Components\TextInput::make('telefono')
                            ->label('Telefono')
                            ->numeric()
                            ->required()
                            ->unique(Corporativo::class, 'telefono', fn ($record) => $record),
                    ]),
                Forms\Components\Section::make('Información de la ubicación')
                    ->schema([
                        Forms\Components\Select::make('ubicacion.departamento_id')
                            ->label('Departamento')
                            ->options(Departamento::all()->pluck('nombre', 'id'))
                            ->searchable()
                            ->required(),
                        Forms\Components\Select::make('ubicacion.ciudad_id')
                            ->label('Ciudad')
                            ->options(function (callable $get) {
                                $departamentoId = $get('ubicacion.departamento_id');
                                return Ciudad::where('departamento_id', $departamentoId)->pluck('nombre', 'id');
                            })
                            ->searchable()
                            ->required(),
                        Forms\Components\TextInput::make('ubicacion.nombre')
                            ->label('Dirección detallada')
                            ->required(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nit')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('razon_social')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('telefono'),
                Tables\Columns\TextColumn::make('ubicacion.ciudad.nombre')
                    ->label('Ciudad')
                    ->searchable(),
                Tables\Columns\TextColumn::make('creator.name')
                    ->label('Creado por')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Fecha de creación')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListCorporativos::route('/'),
            'create' => Pages\CreateCorporativo::route('/create'),
            'edit' => Pages\EditCorporativo::route('/{record}/edit'),
        ];
    }
}
