<?php

echo '<div id="itemhead">
    Choose additional items to include in your package:
</div>';

// create a new array to store the items
$allitems = array(
    'all' => array(
        // a4
        array(
            'name' => 'A4 - 1',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/a4-1.jpg'
        ),
        // album
        array(
            'name' => 'Album 1',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/album-1.jpg'
        ),
        array(
            'name' => 'Album 2',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/album-2.jpg'
        ),
        // film
        array(
            'name' => 'Film 1',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/film-1.jpg'
        ),
        array(
            'name' => 'Film 2',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/film-2.jpg'
        ),
        // jacket
        array(
            'name' => 'Jacket 1',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/jacket-1.jpg'
        ),
        array(
            'name' => 'Jacket 2',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/jacket-2.jpg'
        ),
        // lace
        array(
            'name' => 'Lace 1',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/lace-1.jpg'
        ),
        array(
            'name' => 'Lace 2',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/lace-2.jpg'
        ),
        // photobook
        array(
            'name' => 'Photobook 1',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/photobook-1.jpg'
        ),
        array(
            'name' => 'Photobook 2',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/photobook-2.jpg'
        ),
        // poca
        array(
            'name' => 'Poca 1',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/poca-1.jpg'
        ),
        array(
            'name' => 'Poca 2',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/poca-2.jpg'
        ),
        // shirt
        array(
            'name' => 'Shirt 1',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/shirt-1.jpg'
        ),
        array(
            'name' => 'Shirt 2',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/shirt-2.jpg'
        )
    ),
    'mark' => array(
        array(
            'name' => 'A4 - Mark',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/a4-mark.jpg'
        ),
        array(
            'name' => 'Film - Mark',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/film-mark-1.jpg'
        ),
        array(
            'name' => 'Film - Mark',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/film-mark-2.jpg'
        )
    ),
    'renjun' => array(
        array(
            'name' => 'A4 - Renjun',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/a4-renjun.jpg'
        ),
        array(
            'name' => 'Film - Renjun',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/film-renjun-1.jpg'
        ),
        array(
            'name' => 'Film - Renjun',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/film-renjun-2.jpg'
        )
    ),
    'jeno' => array(
        array(
            'name' => 'A4 - Jeno',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/a4-jeno.jpg'
        ),
        array(
            'name' => 'Film - Jeno',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/film-jeno-1.jpg'
        ),
        array(
            'name' => 'Film - Jeno',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/film-jeno-2.jpg'
        )
    ),
    'haechan' => array(
        array(
            'name' => 'A4 - Haechan',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/a4-haechan.jpg'
        ),
        array(
            'name' => 'Film - Haechan',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/film-haechan-1.jpg'
        ),
        array(
            'name' => 'Film - Haechan',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/film-haechan-2.jpg'
        )
    ),
    'jaemin' => array(
        array(
            'name' => 'A4 - Jaemin',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/a4-jaemin.jpg'
        ),
        array(
            'name' => 'Film - Jaemin',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/film-jaemin-1.jpg'
        ),
        array(
            'name' => 'Film - Jaemin',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/film-jaemin-2.jpg'
        )
    ),
    'chenle' => array(
        array(
            'name' => 'A4 - Chenle',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/a4-chenle.jpg'
        ),
        array(
            'name' => 'Film - Chenle',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/film-chenle-1.jpg'
        ),
        array(
            'name' => 'Film - Chenle',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/film-chenle-2.jpg'
        )
    ),
    'jisung' => array(
        array(
            'name' => 'A4 - Jisung',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/a4-jisung.jpg'
        ),
        array(
            'name' => 'Film - Jisung',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/film-jisung-1.jpg'
        ),
        array(
            'name' => 'Film - Jisung',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/film-jisung-2.jpg'
        )
    )
);

if ($_POST['action'] == 'getMerchItems') {
    $items = $allitems[$_POST['item']];

    foreach ($items as $item) {
        echo '<div class="item">
            <span class="itemprev">
                <img src="' . $item['src'] . '" />
                <span>
                    <h2> ' . $item['name'] . ' </h2>
                    <span> ' . $item['description'] . ' </span>
                </span>
            </span>
            <div class="qtycont">
                <input type="button" class="dec" value="-">
                <input type="text" name="quantity" min="1" max="9" value="0">
                <input type="button" class="inc" value="+">
            </div>
        </div>';
    }

    $items = $allitems['all'];

    foreach ($items as $item) {
        echo '<div class="item">
            <span class="itemprev">
                <img src="' . $item['src'] . '" />
                <span>
                    <h2> ' . $item['name'] . ' </h2>
                    <span> ' . $item['description'] . ' </span>
                </span>
            </span>
            <div class="qtycont">
                <input type="button" class="dec" value="-">
                <input type="text" name="quantity" min="1" max="9" value="0">
                <input type="button" class="inc" value="+">
            </div>
        </div>';
    }
}