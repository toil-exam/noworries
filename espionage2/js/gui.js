
import { GM } from "/espionage2/js/gm.js";



export class GUI {

    constructor(game) {
        this.game = game;
        this.gameScreen = $("#gameScreen");

        for (let player of GM.players) {
            let area = $("#" + player.toLowerCase() + "Area");
            area.html(player + " Area");

            let play = $("#" + player.toLowerCase() + "Play");
            play.html(player + "Play");
        }
    }

    toggleScreen(input = null) {
        console.log("T O G G L E _ S C R E E N : " + input)
        for (let screen of GM.screens) {
            $("#" + screen + "Screen").hide();
        }
    
        if (input) {
            let screen = $("#" + input + "Screen");
            screen.show();
            if (input === "rules") {
                screen.one("click", () => {
                    this.toggleScreen("game");
                });
            } else if (input === "game") {
                $("#rulesToggle").one("click", () => {
                    this.toggleScreen("rules");
                });
            }
        }
    }

    cardSpan(card) {
        let output = $("<span>", {id: "card-" + card.x, class: "card " + card.color + "-card"});
        output.html(card.rs);
        return output;
    }

    updateHand() {
        let hand = this.game.player[0].hand;
        let area = $("#southArea");
        area.html("");
        
        for (let card of hand) {
            //let temp = $("<span>", {id: "card-" + card.x, class: "card " + card.color + "-card"});
            //temp.html(card.rs);
            area.append(this.cardSpan(card));
        }
    }

    activatePlayerHand() {
        console.log("U S E R _ T U R N");

        let hand = this.game.player[0].hand;
        for (let card of hand) {
            console.log("A C T I V A T E : " + card.RankOfSuit);
            //let func = () => {this.game.playUser(card)};
            $("#card-" + card.x).one("click", () => {
                this.game.playUser(card);
            });
        }
    }

    deactivatePlayerHand() {
        console.log("D E A C T I V A T E _ P L A Y E R _ H A N D");
        $(".card").off("click");
        //this.updateHand();
    }

    

    animatePlay(p, card) {
        let player = GM.players[p];
        console.log("A N I M A T E _ P L A Y : " + player + " : " + card.RankOfSuit);
        let area = $("#" + player.toLowerCase() + "Play");

        area.html(this.cardSpan(card));

        area.addClass(player.toLowerCase() + "Play-animate");

    }
}
