<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use App\Models\Produk;
use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    Forms\Components\Select::make('payment_status')
                        ->options([
                            'pending' => 'Pending',
                            'paid' => 'Paid',
                            'failed' => 'Failed',
                        ])
                        ->required(),
                    Forms\Components\Select::make('user_id')
                        ->label('Customer')
                        ->relationship('user', 'name')
                        ->searchable()
                        ->preload()
                        ->required(),
                    Forms\Components\ToggleButtons::make('status')
                        ->label('Status')
                        ->inline()
                        ->default('baru')
                        ->options([
                            'baru' => 'Baru',
                            'proses' => 'Proses',
                            'dikirim' => 'Dikirim',
                            'diterima' => 'Diterima',
                            'dibatalkan' => 'Dibatalkan',
                        ])
                        ->colors([
                            'baru' => 'info',
                            'proses' => 'primary',
                            'dikirim' => 'warning',
                            'diterima' => 'success',
                            'dibatalkan' => 'danger',
                        ])
                        ->icons([
                            'baru' => 'heroicon-m-sparkles',
                            'proses' => 'heroicon-m-arrow-path',
                            'dikirim' => 'heroicon-m-truck',
                            'diterima' => 'heroicon-m-check-badge',
                            'dibatalkan' => 'heroicon-m-x-circle',
                        ])
                        ->required(),
                    Forms\Components\Textarea::make('notes')->columnSpan(2),
                ])->columns(2)->columnSpanFull(),

                Forms\Components\Section::make()->schema([
                    Forms\Components\Repeater::make('items')
                        ->relationship()
                        ->schema([
                            Forms\Components\Select::make('produk')
                                ->relationship('produk', 'nama')
                                ->searchable()
                                ->preload()
                                ->distinct()
                                ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                                ->required()
                                ->reactive()
                                ->afterStateUpdated(fn($state, Set $set) => $set('harga', Produk::find($state)?->harga ?? 0))
                                ->afterStateUpdated(fn($state, Set $set) => $set('total', Produk::find($state)?->harga ?? 0)),
                            Forms\Components\TextInput::make('qty')
                                ->required()
                                ->numeric()
                                ->reactive()
                                ->afterStateUpdated(fn($state, Set $set, Get $get) => $set('total', $state * $get('harga')))
                                ->minValue(1)
                                ->default(1),
                            Forms\Components\TextInput::make('harga')
                                ->required()
                                ->numeric()
                                ->dehydrated()
                                ->readOnly(),
                            Forms\Components\TextInput::make('total')
                                ->required()
                                ->dehydrated()
                                ->numeric()
                                ->readOnly(),
                        ])->columns(4),

                    Placeholder::make('grandtotal')->label('Subtotal')->content(function (Set $set, Get $get) {
                        $total = 0;
                        if (!$repeaters = $get('items')) {
                            return $total;
                        }
                        foreach ($repeaters as $key => $repeater) {
                            $total += $get('items.' . $key . '.total');
                        }

                        return \App\Helpers\FormatRupiah::format($total);
                    }),

                    Forms\Components\Hidden::make('grandtotal')
                        ->default(0),

                ])->columnSpanFull(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('payment_status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->sortable(),
                Tables\Columns\SelectColumn::make('status')
                    ->searchable()
                    ->options([
                        'baru' => 'Baru',
                        'proses' => 'Proses',
                        'dikirim' => 'Dikirim',
                        'diterima' => 'Diterima',
                        'dibatalkan' => 'Dibatalkan',
                    ])
                    ->sortable(),
                Tables\Columns\TextColumn::make('notes')
                    ->searchable(),
                Tables\Columns\TextColumn::make('grandtotal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
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
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationColor(): ?string
    {
        return 'success';
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}