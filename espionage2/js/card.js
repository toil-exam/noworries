

import { GM } from "/espionage2/js/gm.js";


export class Card {

    constructor(x) {
        this.x = x;

        this.rank = Math.floor(this.x / 4);
        this.suit = this.x % 4;

        this.color = this.suit % 2 === 0 ? "black" : "red";
        
        this.Rank = GM.ranks[this.rank];
        this.r = GM.rs[this.rank];

        this.Suit = GM.suits[this.suit];
        this.s = GM.ss[this.suit];

        this.RankOfSuit = this.Rank + " of " + this.Suit;
        this.rs = this.r + this.s;
    }

}
