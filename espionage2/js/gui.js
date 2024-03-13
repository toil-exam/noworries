
import { GM } from "/espionage2/js/gm.js";



export class GUI {

    constructor(game) {
        this.game = game;
        this.gameScreen = $("#gameScreen");

        this.toggleScreen("rules");
        $("#yourTurn").hide();

        /*
        for (let player of GM.players) {
            let area = $("#" + player.toLowerCase() + "Area");
            area.html(player + " Area");

            let play = $("#" + player.toLowerCase() + "Play");
            play.html(player + "Play");
        }
        */
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
                    this.game.update();
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
        output.html("<b>" + card.r + "</b><br/><span class=\"lg\">" + card.symbol + "</span>");
        return output;
    }

    updateHand() {
        let hand = this.game.player[0].hand;
        let area = $("#hand");
        area.html("");
        
        for (let card of hand) {
            //let temp = $("<span>", {id: "card-" + card.x, class: "card " + card.color + "-card"});
            //temp.html(card.rs);
            area.append(this.cardSpan(card));
        }
    }

    updateScore() {
        for (let p = 0; p < 4; p++) {
            let test = false;
            let suit = null;
            let color = null;
            for (let card of this.game.player[p].take) {
                if (card.rank === 12) {
                    test = true;
                    suit = card.symbol;
                    color = card.color;
                }
            }

            let player = GM.players[p];
            let mark = null;
            let count = 0;
            let text = "";
            if (test) {
                for (let card of this.game.player[p].take) {
                    if (card.symbol === suit)
                        count++;
                }
                mark = suit;
                text = "<span class=\"\">" + suit + "</span>: " + count;
            } else {
                count = Math.floor(this.game.player[p].take.length / 4);
                mark = "?";
                while (count > 0) {
                    text += mark;
                    count--;
                }
            }
            $("#" + player.toLowerCase() + "Take").html(text);
            if (color) {
                $("#" + player.toLowerCase() + "Area").addClass(color + "-color");
                $("#" + player.toLowerCase() + "Area").addClass("light-background");
            }
        }
    }

    activatePlayerHand() {
        console.log("U S E R _ T U R N");

        $("#yourTurn").show();

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
        $("#yourTurn").hide();
        $(".card").off("click");
        //this.updateHand();
    }

    

    animatePlay(p, card) {
        let player = GM.players[p];
        console.log("A N I M A T E _ P L A Y : " + player + " : " + card.RankOfSuit);
        let area = $("#" + player.toLowerCase() + "Play");
        let animation = player.toLowerCase() + "Play-animate";

        area.hide();
        area.html(this.cardSpan(card));
        area.removeClass(animation);
        area.show();
        

        area.off("animationend");
        area.one("animationend", () => {
            area.removeClass(animation);
            this.game.passTurn();
        });
        area.addClass(animation);

    }

    clearTable() {
        $(".play").html("");
    }
}
