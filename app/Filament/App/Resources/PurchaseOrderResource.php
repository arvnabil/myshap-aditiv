<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\PurchaseOrderResource\Pages;
use App\Filament\App\Resources\PurchaseOrderResource\RelationManagers;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;
use App\Models\Supplier;
use Awcodes\TableRepeater\Components\TableRepeater;
use Awcodes\TableRepeater\Header;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PurchaseOrderResource extends Resource
{
    protected static ?string $model = PurchaseOrder::class;

    protected static ?string $navigationIcon = 'heroicon-m-building-storefront';
    protected static ?string $navigationGroup = 'Purchase Order';
    protected static ?int $navigationSort = 2;

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

        function IdPO()
        {
            // 'PO-ADT/001/0924'
            $check_po = PurchaseOrder::orderBy('created_at', 'desc')->first();
            if ($check_po === null) {
                $bulanTahun = Carbon::parse(now())->format('my');
                $numberNOW = 'PO-ADT/001/' . $bulanTahun;
                return $numberNOW;
            }
            if ($check_po->purchase_order_number != null) {
                $str = explode('/', $check_po->purchase_order_number);
                $str[1] = str_pad((int)$str[1] + 1, 3, '0', STR_PAD_LEFT);
                $str[2] = Carbon::parse(now())->format('my');
                $result = implode('/', $str);
                return  $result;
            }
        }

        function penyebut($nilai)
        {
            $nilai = abs($nilai);
            $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
            $temp = "";
            if ($nilai < 12) {
                $temp = " " . $huruf[$nilai];
            } else if ($nilai < 20) {
                $temp = penyebut($nilai - 10) . " belas";
            } else if ($nilai < 100) {
                $temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
            } else if ($nilai < 200) {
                $temp = " seratus" . penyebut($nilai - 100);
            } else if ($nilai < 1000) {
                $temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
            } else if ($nilai < 2000) {
                $temp = " seribu" . penyebut($nilai - 1000);
            } else if ($nilai < 1000000) {
                $temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
            } else if ($nilai < 1000000000) {
                $temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
            } else if ($nilai < 1000000000000) {
                $temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
            } else if ($nilai < 1000000000000000) {
                $temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
            }
            return $temp;
        }

        function terbilang($nilai)
        {
            if ($nilai < 0) {
                $hasil = "minus " . trim(penyebut($nilai));
            } else {
                $hasil = trim(penyebut($nilai));
            }
            return $hasil;
        }
        return $form
            ->schema([
                Section::make('Form PurchaseOrder')
                ->description('Information about Purchase Order')
                ->schema([
                    Hidden::make('purchase_order_type_id')
                    ->default(1),
                    Select::make('supplier_id')
                    ->label('Supplier')
                    ->options(Supplier::all()->pluck('name', 'id'))
                    ->searchable()
                        ->required(),
                    TextInput::make('purchase_order_number')
                    ->label("Nomer PO")
                    ->default(IdPO())
                        ->readOnly()
                        ->required(),
                    DatePicker::make('purchase_order_date')
                    ->label('Tanggal PO')
                    ->readOnly()
                        ->default(now()),
                    DatePicker::make('due_date')
                    ->label('Jatuh Tempo')
                    ->default(now()),

                    TableRepeater::make('purchase_order_items')
                    ->label("Item")
                    ->relationship()
                        ->defaultItems(1)
                        ->live()
                        ->afterStateUpdated(function (Set $set, Get $get) {
                            $items = $get('purchase_order_items');
                            // dd($items);
                            $sum = array_sum(array_column($items, 'amount'));
                            // calculate sum
                            $set('subtotal', $sum);
                            $getSubtotal = $get('subtotal');
                            $ppn = (($getSubtotal * 11) / 100);
                            $set('ppn', $ppn);
                            $set('discount', $ppn);
                            $total = $sum + $ppn;
                            $set('total', $total);
                            $set('spelled_out', terbilang($total) . ' rupiah');
                        })
                        // ->renderHeader(false)
                        ->headers([
                            Header::make('Produk')->width('220px')->markAsRequired(),
                            Header::make('QTY')->width('200px')->markAsRequired(),
                            Header::make('Unit Price')->width('200px')->markAsRequired(),
                            Header::make('Satuan')->width('200px')->markAsRequired(),
                            Header::make('Discount')->width('250px')->markAsRequired(),
                            Header::make('Pajak')->width('200px')->markAsRequired(),
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
                                        $getVAT = $get('vat_price');
                                        $set('price_amount', (int)$jumlah);
                                        $set('satuan', null);
                                        $set('amount', (int)$jumlah - (int)$getDiscount - (int)$getVAT);
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

                                        $getVAT = $get('vat_price');
                                        $amount = $get('price_amount');
                                        $discountPrice = (((int)$amount * (int)$state) / 100);
                                        $set('discount_price', $discountPrice);
                                        $set('satuan', null);
                                        $set('amount', (int)$amount - (int)$discountPrice - (int)$getVAT);
                                    }
                                ),

                            TextInput::make('vat')
                            ->prefix("%")
                                ->live()
                                ->placeholder('0')
                                ->default('X')
                                ->required()
                                ->afterStateUpdated(
                                    function ($state, callable $get, callable $set) {
                                        // Update Default Amount Price
                                        $unit_price = $get('unit_price');
                                        $qty = $get('qty');
                                        $jumlah = (int) $unit_price * (int)$qty;
                                        $set('price_amount', (int)$jumlah);

                                        $getDiscount = $get('discount_price');
                                        $amount = $get('price_amount');
                                        $vatPrice = (((int)$amount * (int)$state) / 100);
                                        $set('vat_price', $vatPrice);
                                        $set('satuan', null);
                                        $set('amount', (int)$amount - (int)$getDiscount - (int)$vatPrice);
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
                            Hidden::make('vat_price')
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
                    TextInput::make('insufficient_payment')
                    ->prefix('Rp')
                        ->label('Sisa Tagihan')
                        ->placeholder('Input Manual')
                        ->default(0)
                        ->required(),
                    TextInput::make('message')
                    ->label('Pesan')
                    ->placeholder('Pesan Optional')
                    ->required(),
                    TextInput::make('spelled_out')
                    ->label('Terbilang')
                    ->autocapitalize('words')
                    ->placeholder('Terbilang dari Total')
                    ->required(),


                ])->columns(2)->collapsible(),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('purchase_order_number')
                ->label(__('Nomor PO'))
                ->searchable(),
                TextColumn::make('purchase_order_date')
                ->label(__('Tanggal'))
                ->date('d F Y')
                ->searchable(),
                TextColumn::make('due_date')
                ->date('d F Y')
                ->label(__('Jatuh Tempo')),
                TextColumn::make('supplier.name')
                ->label(__('Supplier')),
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
                    ->url(fn(PurchaseOrder $record): string => route('letter.purchase_order.view', $record))
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
            'index' => Pages\ListPurchaseOrders::route('/'),
            'create' => Pages\CreatePurchaseOrder::route('/create'),
            'edit' => Pages\EditPurchaseOrder::route('/{record}/edit'),
        ];
    }
}
