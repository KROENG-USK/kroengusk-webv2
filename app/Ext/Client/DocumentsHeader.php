<?php

namespace App\Ext\Client;

class DocumentsHeader {
    public static function get() {
        $documents = [
            [
                'name'  => 'Inventory Alat/Barang Kroeng',
                'url'   => url('/dokumen/inventory')
            ],
            [
                'name'  => 'Peminjaman Alat Kroeng',
                'url'   => url('/dokumen/pinjam-alat/')
            ],
            [
                'name'  => 'Pengembalian Alat Kroeng',
                'url'   => url('/dokumen/pengembalian-alat/')
            ],
            [
                'name'  => 'Repository Projects',
                'url'   => url('/dokumen/repository/')
            ]
        ];

        return $documents;
    }
}