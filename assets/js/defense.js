require('../css/vanillaSelectBox.css');

import { vanillaSelectBox } from './vanillaSelectBox';

let monsterSelect = new vanillaSelectBox("#monsters", {
    search: true,
    translations: {
        'all' : 'Tous'
    },
});