
export class GM {


    static ranks = ["Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Jack", "Queen", "King", "Ace"];
    static rs = ["2","3","4","5","6","7","8","9","10","J","Q","K","A"];

    static suits = ["Spades", "Hearts", "Clubs", "Diamonds"];
    static ss = ["S", "H", "C", "D"];
    static suitChars = ["&spades;","&hearts;","&clubs;","&diams;"];
	
    static teams = ["Black", "Red"];
    

    static players = ["South", "West", "North", "East"];


    static screens = ["rules", "game", "pause", "gameOver", "scoreCard"];





    static aces = [0, 1, 2, 3];
    static nonAces = [...Array(48).keys().map((key) => {return key + 4})];
    static deck = [...Array(52).keys()]

    
    //return an array [0,1,2...49,50,51]
    newDeck(){
        return [...Array(52).keys()];
    }

    static shuffle(arr) {
        let output = [...arr];
        let temp;
        let r;
        for (i = 0;  i < arr.length; i++) {
            r = Math.random * arr.length;
            temp = output[i];
            output[i] = output[r];
            output[r] = temp;
        }
        return output;
    }

}