

export class Card {

    constructor(x) {
        this.x = x;
    }

    getRank() { return this.x % 13; }
    getSuit() { return this.x % 4; }

    

}
