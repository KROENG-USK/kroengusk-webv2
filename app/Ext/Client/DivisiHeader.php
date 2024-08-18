<?php

namespace App\Ext\Client;

class DivisiHeader {
    public static function get() {
        $divisi = [
            [
                'id'    => 1,
                'name'  => 'Divisi Non - Technical',
                // 'url'   => url('/divisi/non-technical')
                'url'   => url('divisi', ['id' => 1, 'divisi'=> 'Non Technical'])
            ],
            [
                'name'  => 'Divisi Technical (Programmer)',
                // 'url'   => url('/divisi/technical/programmer')
                'url'   => url('divisi', ['id' => 2, 'divisi'=> 'Programmer'])
            ],
            [
                'name'  => 'Divisi Technical (Designer)',
                // 'url'   => url('/divisi/technical/designer')
                'url'   => url('divisi', ['id' => 3, 'divisi'=> 'Designer'])
            ],
            [
                'name'  => 'Divisi Technical (Electrical)',
                // 'url'   => url('/divisi/technical/electrical')
                'url'   => url('divisi', ['id' => 4, 'divisi'=> 'Electrical'])
            ],
            // [
            //     'name'  => 'Divisi Technical (Mechanical)',
            //     // 'url'   => url('/divisi/technical/mechanical')
            //     'url'   => url('divisi', ['id' => 5, 'divisi'=> 'Mechanical'])
            // ]
        ];

        return $divisi;
    }
}