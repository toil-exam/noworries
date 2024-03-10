
import { GM } from "/espionage2/js/gm.js";


export class AI {
    
    constructor() {

    }

    play(currentLeadPlay, hand) {
        let output = null;
        let possible = [];
        let r;

        currentLeadPlay = currentLeadPlay || hand[0];

        for (let card of hand) {
            if (GM.compare(currentLeadPlay, card) === card) {
                possible.push(card);
            }
        }

        if (possible.length > 1) {
            r = Math.floor(Math.random * possible.length);
            output = possible[r];
        } else if (possible.length === 1) {
            output = possible[0];
        } else {
            r = Math.floor(Math.random * hand.length);
            output = hand[r];
        }

        return output;
    }

}