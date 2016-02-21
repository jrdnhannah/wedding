<?php

return [
    'date' => '2016-10-25',

    'rsvp_close' => env('RSVP_CLOSE_DATE'),
    
    'contact_number' => env('CONTACT_NUMBER'),

    'venue' => [
        'name' => 'Rivervale Barn'
    ],

    'ga_key' => env('GOOGLE_ANALYTICS'),
    
    'guests' => [

    ],
    
    'menu' => [
        'adult' => [
            'starter' => [
                'prawn01'  => 'Prawn & Crayfish Cocktail, cos lettuce and Marie Rose sauce',
                'scotch01' => 'Smoked bacon Scotch egg, apple purée and crisp pancetta',
                'veggie01' => 'Risotto of wild mushrooms, truffle and Gran Moravia vinaigrette (V)',
                'veggie02' => 'Raviolio of Cerney goat\'s cheese, confit shallots, tomato and basil vinaigrette (V)',
            ],
            'main' => [
                'fillet01' => 'Fillet of beef, Dauphinose potato, green peppercorn sauce',
                'lamb01'   => 'Roast rump of English lamb, confit shallots, garlic and rosemary jus',
                'veggie03' => 'Fine plum tomato tart, black olive tapenadte, boccochino mozzarella and wild rocket (V)',
                'veggie04' => 'Nut and bean roast, with roast potatos, honey roast parsnips & carrots, thyme and mushroom gravy (V)',
            ],
            'dessert' => [
                'cheesecake01' => 'Vanilla cheese cake with raspberry coulis',
                'brownie01'    => 'Triple chocolate brownie with vanilla ice cream',
                'tart01'       => 'Glazed lemon tart with raspberry coulis'
            ],
        ],
        
        'childrens' => [
            'starter' => [
                'melon01' => 'Melon with forest fruits',
                'soup02'  => 'Seasonal soup with bread and butter',
                'balls01' => 'Dough balls with plain or garlic butter served with vegetable sticks',
            ],
            'main' => [
                'mac01'      => 'Macaroni cheese',
                'pizza01'    => 'Magarita pizza with salad',
                'chicken01'  => 'Grilled chicken breast with croquette potatoes and petit pois',
                'sausages01' => 'Pork sausages with chips and baked beans',
                'salmon01'   => 'Salmon fish cakes with chips and peas',
                'pie01'      => 'Shephard\'s pie with carrots and beans'
            ],
            'dessert' => [
                'icecream01' => 'Selection of ice cream with a chocolate wafer',
            ],
        ],
    ],
];
