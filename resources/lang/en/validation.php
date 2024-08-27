<?php

return [
    // Pesan Default
    'required' => 'Kolom :attribute harus diisi.',
    'string' => 'Kolom :attribute harus berupa teks.',
    'max' => [
        'string' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
    ],
    'unique' => 'Kolom :attribute sudah terdaftar, silahkan pilih yang lain.',
    'regex' => 'Kolom :attribute hanya boleh mengandung huruf, angka, dan underscore (_).',
    'invalid' => 'Kolom :attribute tidak valid.',

    // Nama-nama Kolom yang diatributkan
    'attributes' => [
        'name' => 'nama',
        'user_selected' => 'penghuni',
        'price' => 'tagihan',
        'description' => 'deskripsi',
        'email' => 'alamat email',
        'password' => 'kata sandi',
    ],

    // Tambahan Pesan Khusus (Opsional)
    'confirmed' => 'Konfirmasi :attribute tidak cocok.',
    'email' => 'Kolom :attribute harus berupa alamat email yang valid.',
    'numeric' => 'Kolom :attribute harus berupa angka.',
    'min' => [
        'string' => 'Kolom :attribute harus minimal :min karakter.',
        'numeric' => 'Kolom :attribute harus minimal :min.',
    ],
    'integer' => 'Kolom :attribute harus berupa bilangan bulat.',
    'boolean' => 'Kolom :attribute harus berupa nilai benar atau salah.',
];
