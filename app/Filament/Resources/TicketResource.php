<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TicketResource\Pages;
use App\Filament\Resources\TicketResource\RelationManagers;
use App\Models\Ticket;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use App\Models\User;
use Filament\Tables\Columns\TextColumn;

class TicketResource extends Resource
{
    protected static ?string $model = Ticket::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('titre')->required()->maxLength(255),
                Textarea::make('description')->required()->rows(5),
                
                Select::make('statut')
                    ->label('Statut')
                    ->options([
                        'Ouvert' => 'Ouvert',
                        'En cours' => 'En cours',
                        'Résolu' => 'Résolu',
                        'Fermé' => 'Fermé',
                    ])
                    ->required(),

                Select::make('priorite')
                    ->label('Priorité')
                    ->options([
                        'faible' => 'Faible',
                        'moyenne' => 'Moyenne',
                        'elevee' => 'Élevée',
                    ])
                    ->required(),

                Select::make('id_employe')
                    ->label("Employé concerné")
                    ->relationship('employe', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('id_technicien')
                    ->label("Technicien assigné")
                    ->relationship('technicien', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('titre')->searchable()->sortable(),
                TextColumn::make('statut')->sortable(),
                TextColumn::make('priorite')->sortable(),
                // TextColumn::make('assignedUser.name')->label('Assigné à')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListTickets::route('/'),
            'create' => Pages\CreateTicket::route('/create'),
            'edit' => Pages\EditTicket::route('/{record}/edit'),
        ];
    }
}
