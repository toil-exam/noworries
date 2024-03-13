
import { GM } from "/espionage2/js/gm.js";


export class AI {
    
    constructor() {

    }

    play(currentLeadPlay, hand) {
        //console.log("A I _ T H O U G H T S");
        //console.log(currentLeadPlay);
        //console.log(...hand);
        let output = null;
        let possible = [];
        //let r;

        //currentLeadPlay = currentLeadPlay || hand[0];
        if (currentLeadPlay) { // already a card played
            for (let card of hand) {
                if (GM.compare(currentLeadPlay, card).x === card.x) {
                    possible.push(card);
                }
            }
        } else { // no card already played, just play lowest card
            possible.push(GM.lowest(...hand));
            /*
            for (let card of hand) {
                if (possible.length === 0) {
                    possible.push(card); // empty possibles? just throw in
                } else {
                    if (card.rank === possible[0].rank) { // same rank as current possibles? just throw in
                        possible.push(card);
                    } else if (card.rank < possible[0].rank) { // lower rank than current? new array with just this card
                        possible = [card];
                    }
                }
            }
            */
        }

        //console.log(possible);

        if (possible.length > 1) {
            //r = Math.floor(Math.random() * possible.length);
            output = GM.lowest(...possible);
        } else if (possible.length === 1) {
            output = possible[0];
        } else {
            console.log("just play lowest ???");
            console.log(hand);
            output = GM.lowest(...hand);

            //r = Math.floor(Math.random() * hand.length);
            //output = hand[r];
        }

        return output;
    }

}