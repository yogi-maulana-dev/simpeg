<?php

namespace App\Filament\Resources\Pegawais\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PegawaiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('nip')
                ->required()
                ->unique(ignoreRecord: true),

            TextInput::make('nama')
                ->required(),

            DatePicker::make('tanggal_lahir'),

            Select::make('jenis_kelamin')
                ->options([
                    'L' => 'Laki-laki',
                    'P' => 'Perempuan',
                ]),

            TextInput::make('alamat'),
            TextInput::make('no_hp'),
            TextInput::make('email'),

            Select::make('id_jabatan')
                ->relationship('jabatan', 'nama_jabatan')
                ->required(),

            Select::make('id_unit')
                ->relationship('unit', 'nama_unit')
                ->required(),

            Select::make('id_status')
                ->relationship('status', 'nama_status')
                ->required(),

            Select::make('id_golongan')
                ->relationship('golongan', 'nama_golongan')
                ->required(),

            DatePicker::make('tanggal_masuk'),
        ]);
    }
}