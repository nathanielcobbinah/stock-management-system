<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Export Format
    |--------------------------------------------------------------------------
    |
    | This option controls the default export format that will be used when
    | a new export is created. You can change this to 'csv', 'xls', 'xlsx',
    | or 'pdf'.
    |
    */

    'export_format' => 'xlsx',

    /*
    |--------------------------------------------------------------------------
    | Value Binder
    |--------------------------------------------------------------------------
    |
    | This allows you to globally apply a value binder to all exports.
    | The class should implement PhpOffice\PhpSpreadsheet\Cell\IValueBinder
    |
    */

    'value_binder' => [
        // 'my_value_binder' => MyValueBinder::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Autosize Method
    |--------------------------------------------------------------------------
    |
    | Set the method you want to use to autosize columns when exporting
    | spreadsheets. Choose from 'approx' (default), 'all', or 'none'.
    |
    */

    'autosize-method' => 'approx',

    /*
    |--------------------------------------------------------------------------
    | Export Temporary Path
    |--------------------------------------------------------------------------
    |
    | This is the path where exports will be stored before they are downloaded.
    | Change it to the desired temporary storage path for exported files.
    |
    */

    'temporary_path' => storage_path('exports'),

    /*
    |--------------------------------------------------------------------------
    | Pre-calculate formulas during export
    |--------------------------------------------------------------------------
    |
    | This option controls whether Excel should pre-calculate formulas during export.
    | Set it to `true` to enable pre-calculation, and `false` to disable it.
    |
    */

    'pre_calculate_formulas' => false,

];
