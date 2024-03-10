
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
        console.log("C O M P A R E");
        console.log(cards);
        let output = null;

        let rank = null;
        let suit = null;


        for (let card of cards) {
            if (!rank) {
                rank = card.getRank();
                suit = card.getSuit();
                output = card;
            } else {
                if (rank < card.getRank() && suit === card.getSuit()) {
                    rank = card.getRank();
                    output = card;
                }
            }
        }

        console.log(output);
        return output;
    }

}