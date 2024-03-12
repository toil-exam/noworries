
export class GM {


    static ranks = ["Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Jack", "Queen", "King", "Ace"];
    static rs = ["2","3","4","5","6","7","8","9","10","J","Q","K","A"];

    static suits = ["Spades", "Hearts", "Clubs", "Diamonds"];
    static ss = ["S", "H", "C", "D"];
    static suitChars = ["&spades;","&hearts;","&clubs;","&diams;"];
	
    static teams = ["Black", "Red"];
    

    static players = ["South", "West", "North", "East"];


    static screens = ["rules", "game", "pause", "gameOver", "scoreCard"];





    static aces = [48, 49, 50, 51];
    static nonAces = [...Array(48).keys()];
    static deck = [...Array(52).keys()]

    
    //return an array [0,1,2...49,50,51]
    newDeck(){
        return [...Array(52).keys()];
    }

    static shuffle(arr) {

        return arr.sort(() => Math.random() - 0.5);

        /*
        let output = arr.slice();
        let temp;
        let r;
        for (let i = 0, length = arr.length;  i < length; i++) {
            r = Math.random * length;
            temp = output[i];
            output[i] = output[r];
            output[r] = temp;
        }
        return output;
        */
    }



    static compare(...cards) {
        //console.log("C O M P A R E");
        //console.log(cards);
        let output = null;

        let rank = null;
        let suit = null;


        for (let card of cards) {
            if (!output) {
                rank = card.rank;
                suit = card.suit;
                output = card;
            } else {
                if (rank < card.rank && suit === card.suit) {
                    rank = card.rank;
                    output = card;
                }
            }
        }

        //console.log(output);
        return output;
    }


    static lowest(...cards) {
        console.log("L O W E S T");
        //console.log(...cards);
        let arr = [];
        let output = null;

        for (let card of cards) {
            if (arr.length === 0) {
                arr.push(card); // empty arrs? just throw in
            } else {
                if (card.rank === arr[0].rank) { // same rank as current arrs? just throw in
                    arr.push(card);
                } else if (card.rank < arr[0].rank) { // lower rank than current? new array with just this card
                    arr = [card];
                }
            }
        }

        if (arr.length > 1) {
            let r = Math.floor(Math.random * arr.length);
            output = arr[r];
        } else if (arr.length === 1) {
            output = arr[0];
        }

        return output;
    }
}