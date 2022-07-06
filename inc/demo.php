<?php
/**
 * Theme Demo Importer
 *
 * https://ocdi.com/quick-integration-guide/
 */

function ocdi_import_files() {
  return [
    [
      'import_file_name'           => 'Demo1',
      'categories'                 => [ 'Sale Page'],
      'import_file_url'            => 'http://donjaicdn.com/demo/plant/v2/content.xml',
      'import_widget_file_url'     => 'http://donjaicdn.com/demo/plant/v2/widgets.wie',
      'import_customizer_file_url' => 'http://donjaicdn.com/demo/plant/v2/customizer.dat',
      'import_preview_image_url'   => 'http://donjaicdn.com/demo/plant/v2/preview.jpg',
      'preview_url'                => 'https://plant.donjaidemo.com/',
    ],
	[
        'import_file_name'           => 'Demo2',
        'categories'                 => [ 'Sale Page'],
        'import_file_url'            => 'http://donjaicdn.com/demo/plant/v2/content.xml',
        'import_widget_file_url'     => 'http://donjaicdn.com/demo/plant/v2/widgets.wie',
        'import_customizer_file_url' => 'http://donjaicdn.com/demo/plant/v2/customizer.dat',
        'import_preview_image_url'   => 'http://donjaicdn.com/demo/plant/v2/preview.jpg',
        'preview_url'                => 'https://plant.donjaidemo.com/',
      ],
      [
        'import_file_name'           => 'Demo3',
        'categories'                 => [ 'Sale Page'],
        'import_file_url'            => 'http://donjaicdn.com/demo/plant/v2/content.xml',
        'import_widget_file_url'     => 'http://donjaicdn.com/demo/plant/v2/widgets.wie',
        'import_customizer_file_url' => 'http://donjaicdn.com/demo/plant/v2/customizer.dat',
        'import_preview_image_url'   => 'http://donjaicdn.com/demo/plant/v2/preview.jpg',
        'preview_url'                => 'https://plant.donjaidemo.com/',
      ],
  ];
}
add_filter( 'ocdi/import_files', 'ocdi_import_files' );


