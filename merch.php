<?php

echo '<div id="itemhead">
    Choose additional items to include in your package:
</div>';

// create a new array to store the items
$allitems = array(
    'all' => array(
        // album
        array(
            'name' => 'NCT DREAM Glitch Mode Album',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/album-1.jpg'
        ),
        // array(
        //     'name' => 'NCT DREAM Glitch Mode Album',
        //     'description' => 'Description',
        //     'price' => '1.00',
        //     'src' => 'media/items/album-2.jpg'
        // ),
        // photobook
        array(
            'name' => 'NCT DREAM Glitch Mode Photobook',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/photobook-1.jpg'
        ),
        // array(
        //     'name' => 'NCT DREAM Glitch Mode Photobook',
        //     'description' => 'Description',
        //     'price' => '1.00',
        //     'src' => 'media/items/photobook-2.jpg'
        // ),
        // a4
        array(
            'name' => 'NCT DREAM Glitch Mode A4 Poster',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/a4-1.jpg'
        ),
        // film
        array(
            'name' => 'NCT DREAM Film Photo v1',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/film-1.jpg'
        ),
        array(
            'name' => 'NCT DREAM Film Photo v2',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/film-2.jpg'
        ),
        // poca
        array(
            'name' => 'NCT DREAM Photocard v1',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/poca-1.jpg'
        ),
        array(
            'name' => 'NCT DREAM Photocard v2',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/poca-2.jpg'
        ),
        // jacket
        array(
            'name' => 'NCT DREAM Jacket',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/jacket-1.jpg'
        ),
        // array(
        //     'name' => 'NCT DREAM Jacket',
        //     'description' => 'Description',
        //     'price' => '1.00',
        //     'src' => 'media/items/jacket-2.jpg'
        // ),
        // shirt
        array(
            'name' => 'NCT DREAM Shirt',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/shirt-1.jpg'
        ),
        // array(
        //     'name' => 'NCT DREAM Shirt',
        //     'description' => 'Description',
        //     'price' => '1.00',
        //     'src' => 'media/items/shirt-2.jpg'
        // ),
        // lace
        array(
            'name' => 'NCT DREAM ID Lace',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/lace-1.jpg'
        ) //,
        // array(
        //     'name' => 'NCT DREAM ID Lace',
        //     'description' => 'Description',
        //     'price' => '1.00',
        //     'src' => 'media/items/lace-2.jpg'
        // )
    ),
    'mark' => array(
        array(
            'name' => 'NCT DREAM Glitch Mode A4 Poster - Mark',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/a4-mark.jpg'
        ),
        array(
            'name' => 'NCT DREAM Film Photo - Mark v1',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/film-mark-1.jpg'
        ),
        array(
            'name' => 'NCT DREAM Film Photo - Mark v2',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/film-mark-2.jpg'
        )
    ),
    'renjun' => array(
        array(
            'name' => 'NCT DREAM Glitch Mode A4 Poster - Renjun',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/a4-renjun.jpg'
        ),
        array(
            'name' => 'NCT DREAM Film Photo - Renjun v1',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/film-renjun-1.jpg'
        ),
        array(
            'name' => 'NCT DREAM Film Photo - Renjun v2',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/film-renjun-2.jpg'
        )
    ),
    'jeno' => array(
        array(
            'name' => 'NCT DREAM Glitch Mode A4 Poster - Jeno',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/a4-jeno.jpg'
        ),
        array(
            'name' => 'NCT DREAM Film Photo - Jeno v1',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/film-jeno-1.jpg'
        ),
        array(
            'name' => 'NCT DREAM Film Photo - Jeno v2',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/film-jeno-2.jpg'
        )
    ),
    'haechan' => array(
        array(
            'name' => 'NCT DREAM Glitch Mode A4 Poster - Haechan',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/a4-haechan.jpg'
        ),
        array(
            'name' => 'NCT DREAM Film Photo - Haechan v1',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/film-haechan-1.jpg'
        ),
        array(
            'name' => 'NCT DREAM Film Photo - Haechan v2',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/film-haechan-2.jpg'
        )
    ),
    'jaemin' => array(
        array(
            'name' => 'NCT DREAM Glitch Mode A4 Poster - Jaemin',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/a4-jaemin.jpg'
        ),
        array(
            'name' => 'NCT DREAM Film Photo - Jaemin v1',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/film-jaemin-1.jpg'
        ),
        array(
            'name' => 'NCT DREAM Film Photo - Jaemin v2',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/film-jaemin-2.jpg'
        )
    ),
    'chenle' => array(
        array(
            'name' => 'NCT DREAM Glitch Mode A4 Poster - Chenle',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/a4-chenle.jpg'
        ),
        array(
            'name' => 'NCT DREAM Film Photo - Chenle v1',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/film-chenle-1.jpg'
        ),
        array(
            'name' => 'NCT DREAM Film Photo - Chenle v2',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/film-chenle-2.jpg'
        )
    ),
    'jisung' => array(
        array(
            'name' => 'NCT DREAM Glitch Mode A4 Poster - Jisung',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/a4-jisung.jpg'
        ),
        array(
            'name' => 'NCT DREAM Film Photo - Jisung v1',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/film-jisung-1.jpg'
        ),
        array(
            'name' => 'NCT DREAM Film Photo - Jisung v2',
            'description' => 'Description',
            'price' => '1.00',
            'src' => 'media/items/film-jisung-2.jpg'
        )
    )
);

if ($_POST['action'] == 'getMerchItems') {

    if ($_POST['item'] != 'all') {
        $items = $allitems[$_POST['item']];

        foreach ($items as $item) {
            echo '<div class="item featured-item">
                <span class="itemprev">
                    <img src="' . $item['src'] . '" />
                    <span>
                        <h2> ' . $item['name'] . ' </h2>
                        <span> ' . $item['description'] . ' </span>
                    </span>
                </span>
                <form class="buyitem">
                    <div class="qtycont">
                        <input type="hidden" name="prod_service" value="' . $item['name'] . '">
                        <input type="button" class="dec" value="-"
                            onclick="this.parentNode.querySelector(\'input[type=number]\').stepDown()">
                        <input type="number" name="quantity" min="0" max="9" value="0">
                        <input type="button" class="inc" value="+"
                            onclick="this.parentNode.querySelector(\'input[type=number]\').stepUp()">
                    </div>
                </form>
            </div>';
        }
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
            <form class="buyitem">
                <div class="qtycont">
                    <input type="hidden" name="prod_service" value="' . $item['name'] . '">
                    <input type="button" class="dec" value="-"
                        onclick="this.parentNode.querySelector(\'input[type=number]\').stepDown()">
                    <input type="number" name="quantity" min="0" max="9" value="0">
                    <input type="button" class="inc" value="+"
                        onclick="this.parentNode.querySelector(\'input[type=number]\').stepUp()">
                </div>
            </form>
        </div>';
    }
}