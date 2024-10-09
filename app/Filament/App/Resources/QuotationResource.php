<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\QuotationResource\Pages;
use App\Models\Quotation;
use Awcodes\TableRepeater\Components\TableRepeater;
use Awcodes\TableRepeater\Header;
use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class QuotationResource extends Resource
{
    protected static ?string $model = Quotation::class;

    protected static ?string $navigationIcon = 'heroicon-m-ticket';
    protected static ?string $navigationGroup = 'Quotation Features';
    protected static ?int $navigationSort = 1;

    public static function getPermissionPrefixes(): array
    {
        return [
            'view',
            'view_any',
            'create',
            'update',
            'delete',
        ];
    }
    public static function form(Form $form): Form
    {

        function IdQuotation()
        {
            // 'QO1.1024.001'
            $check_po = Quotation::orderBy('created_at', 'desc')->first();
            if ($check_po === null) {
                $bulanTahun = Carbon::parse(now())->format('my');
                $numberNOW = Auth::user()->quotation_number . '.' . $bulanTahun . '.001';
                return $numberNOW;
            }
            if ($check_po->quotation_number != null) {
                $str = explode('.', $check_po->quotation_number);
                $bulanTahun = Carbon::parse(now())->format('my');
                $str[0] = Auth::user()->quotation_number;
                if ($str[1] != $bulanTahun) {
                    $restart = 000;
                    $str[1] = $bulanTahun;
                    $str[2] = str_pad((int)$restart + 1, 3, '0', STR_PAD_LEFT);
                    $result = implode('.', $str);
                    return  $result;
                } else {
                    $str[1] = $bulanTahun;
                    $str[2] = str_pad((int)$str[2] + 1, 3, '0', STR_PAD_LEFT);
                    $result = implode('.', $str);
                    return  $result;
                }
            }
        }

        return $form
            ->schema([
                Section::make('Form Quotation')
                ->description('Information about Quotation')
                ->schema([
                    TextInput::make('quotation_number')
                    ->label("Nomer Quotation")
                    ->default(IdQuotation())
                        ->readOnly()
                        ->required(),
                    TextInput::make('customer_name')
                    ->label('Customer Name')
                    ->autocapitalize('words')
                    ->required(),
                    TextInput::make('customer_email')
                    ->label('Customer Email')
                    ->email()
                        ->required(),
                    TextInput::make('customer_phone')
                    ->label('Customer Phone')
                    ->live()
                        ->reactive()
                        ->required()
                        ->afterStateUpdated(function (Set $set, ?string $state) {
                            return $set("phone", ltrim($state, "0"));
                        })
                        ->prefix('+62'),
                    Textarea::make('customer_address')->required(),
                    TextInput::make('customer_company')
                    ->label("Customer Company")
                    ->required(),

                    DatePicker::make('quotation_date')
                    ->label('Tanggal PO')
                    ->readOnly()
                        ->default(now()),
                    DatePicker::make('due_date')
                    ->label('Jatuh Tempo')
                    ->default(now()),

                    TableRepeater::make('quotation_items')
                    ->label("Item")
                    ->relationship()
                        ->defaultItems(1)
                        ->live()
                        ->afterStateUpdated(function (Set $set, Get $get) {
                            $items = $get('quotation_items');
                            $sum = array_sum(array_column($items, 'amount'));
                            // calculate sum
                            $set('subtotal', $sum);
                            $getSubtotal = $get('subtotal');
                            $ppn = (($getSubtotal * 11) / 100);
                            $set('ppn', $ppn);
                            $set('discount', $ppn);
                            $total = $sum + $ppn;
                            $set('total', $total);
                        })
                        // ->renderHeader(false)
                        ->headers([
                            Header::make('Produk')->width('220px')->markAsRequired(),
                            Header::make('QTY')->width('200px')->markAsRequired(),
                            Header::make('Unit Price')->width('200px')->markAsRequired(),
                            Header::make('Satuan')->width('200px')->markAsRequired(),
                            Header::make('Discount')->width('250px')->markAsRequired(),
                            Header::make('Jumlah')->width('250px')->markAsRequired(),
                            Header::make('')->width('0px')->markAsRequired(),
                        ])
                        ->schema([
                            TextInput::make('product_name')
                            ->placeholder('Keterangan')
                            ->autocapitalize('words')
                            ->required(),
                            TextInput::make('qty')
                            ->live()
                                ->placeholder('Quantity')
                                ->autocapitalize('words')
                                ->required()
                                ->default(0)
                                ->afterStateUpdated(
                                    function ($state, callable $get, callable $set) {
                                        $unit_price = $get('unit_price');
                                        $jumlah = (int) $unit_price * (int)$state;
                                        $getDiscount = $get('discount_price');
                                        $set('price_amount', (int)$jumlah);
                                        $set('satuan', null);
                                        $set('amount', (int)$jumlah - (int)$getDiscount);
                                    }
                                ),
                            TextInput::make('unit_price')
                            ->prefix("Rp")
                                ->default(0)
                                ->required()
                                ->live()
                                ->afterStateUpdated(
                                    function ($state, callable $get, callable $set) {
                                        $quantity = $get('qty');
                                        $jumlah = (int) $state * (int)$quantity;
                                        $set('amount', $jumlah);
                                        $set('satuan', null);
                                        $set('price_amount', $jumlah);
                                    }
                                ),
                            Select::make('satuan')
                            ->label('Satuan')
                            ->options([
                                'License' => 'License',
                                'Paket' => 'Paket',
                                'Unit' => 'Unit',
                                'Pcs' => 'Pcs',
                            ])
                                ->searchable()
                                ->required(),
                            TextInput::make('discount')
                            ->prefix("%")
                                ->live()
                                ->placeholder('0')
                                ->default(0)
                                ->required()
                                ->afterStateUpdated(
                                    function ($state, callable $get, callable $set) {
                                        // Update Default Amount Price
                                        $unit_price = $get('unit_price');
                                        $qty = $get('qty');
                                        $jumlah = (int) $unit_price * (int)$qty;
                                        $set('price_amount', (int)$jumlah);

                                        $amount = $get('price_amount');
                                        $discountPrice = (((int)$amount * (int)$state) / 100);
                                        $set('discount_price', $discountPrice);
                                        $set('satuan', null);
                                        $set('amount', (int)$amount - (int)$discountPrice);
                                    }
                                ),


                            TextInput::make('amount')
                            ->prefix("Rp")
                                ->placeholder('0')
                                ->live()
                                ->default(0)
                                ->readOnly()
                                ->required(),
                            // yang hitungan
                            Hidden::make('discount_price')
                            ->default(0),
                            Hidden::make('price_amount')
                            ->default(0)
                        ])
                        ->columnSpan('full'),
                    TextInput::make('subtotal')
                    ->prefix('Rp')
                        ->label('Subtotal')
                        ->placeholder('Otomatis Subtotal')
                        ->readOnly()
                        ->live()
                        ->required(),
                    TextInput::make('ppn')
                    ->label('PPN 11%')
                    ->prefix('Rp')
                        ->placeholder('Otomatis PPN 11%')
                        ->readOnly()
                        ->required(),
                    TextInput::make('total')
                    ->prefix('Rp')
                        ->label('Total')
                        ->placeholder('Otomatis Subtotal + PPN')
                        ->readOnly()
                        ->required(),
                    Hidden::make('user_id')->default(Auth::user()->id)

                ])->columns(2)->collapsible(),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('quotation_number')
                ->label(__('Nomor Quotation'))
                ->searchable(),
                TextColumn::make('quotation_type.company_alias')
                ->label(__('From'))
                ->searchable(),
                TextColumn::make('quotation_date')
                ->label(__('Tanggal'))
                ->date('d F Y')
                ->searchable(),
                TextColumn::make('due_date')
                ->date('d F Y')
                ->label(__('Jatuh Tempo')),
                TextColumn::make('customer_name')
                ->label(__('Customer')),
                TextColumn::make('customer.company.name')
                ->label(__('Company')),
                TextColumn::make('total')
                ->money('idr')
                ->label(__('Total Nilai')),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make()
                    ->label(__('default.view_detail'))
                    ->url(fn(Quotation $record): string => route('letter.quotation.view', $record))
                    ->openUrlInNewTab(),
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
            'index' => Pages\ListQuotations::route('/'),
            'create' => Pages\CreateQuotation::route('/create'),
            'edit' => Pages\EditQuotation::route('/{record}/edit'),
        ];
    }
}
