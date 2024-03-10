

import { GM } from "/espionage2/js/gm.js";


export class Card {

    constructor(x) {
        this.x = x;
        //console.log(x + " : " + this.rankOfSuits());
    }

    getRank() { return Math.floor(this.x / 4); }
    getSuit() { return this.x % 4; }

    rankOfSuits() {
        return GM.ranks[this.getRank()] + " of " + GM.suits[this.getSuit()];
    }

}
