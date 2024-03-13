
import { GM } from "/espionage2/js/gm.js";



export class GUI {

    constructor(game) {
        this.game = game;

        $("#yourTurn").hide();
        this.toggleScreen("rules");
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
        let output = $("<span>", {id: "card-" + card.x, class: "card " + card.color + "-card light-background"});
        output.html("<b>" + card.r + "</b><br/><span class=\"lg\">" + card.S + "</span>");
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

            $("#card-" + card.x).removeClass("light-background");
            $("#card-" + card.x).addClass("gray-background");
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
                    suit = card.S;
                    color = card.color;
                }
            }

            let player = GM.players[p];
            let mark = null;
            let count = 0;
            let text = "";
            if (test) {
                for (let card of this.game.player[p].take) {
                    if (card.S === suit)
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
                $("#" + player.toLowerCase() + "Area").removeClass("light-border");
                $("#" + player.toLowerCase() + "Area").addClass(color + "-color");
                $("#" + player.toLowerCase() + "Area").addClass(color + "-border");
                $("#" + player.toLowerCase() + "Area").addClass("light-background");
            }
        }
    }

    activatePlayerHand() {
        console.log("U S E R _ T U R N");

        $("#yourTurn").show();

        let round = this.game.currentRound();
        let currentWinner = GM.compare(...round);

        let hand = this.game.player[0].hand;
        let test = round.length === 0;
        for (let card of hand) {
            //console.log("A C T I V A T E : " + card.RankOfSuit);

            if (test ||  GM.compare(currentWinner, card).x === card.x) {
                $("#card-" + card.x).removeClass("gray-background");
                $("#card-" + card.x).addClass("light-background");
            }

            //let func = () => {this.game.playUser(card)};
            $("#card-" + card.x).one("click", () => {
                this.game.playUser(card);
            });
        }
    }

    deactivatePlayerHand() {
        console.log("D E A C T I V A T E _ P L A Y E R _ H A N D");

        for (let card of this.game.player[0].hand) {
            $("#card-" + card.x).removeClass("light-background");
            $("#card-" + card.x).addClass("gray-background");
        }
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

        let round = this.game.currentRound();
        round.push(this.game.player[p].play); // tag on new play
        let currentWinner = GM.compare(...round);
        for (let card of round) {
            if (card.x !== currentWinner.x) {
                $("#card-" + card.x).removeClass("light-background");
                $("#card-" + card.x).addClass("gray-background");
            }
        }

        for (let card of this.game.player[0].hand) {
            if (GM.compare(currentWinner, card).x !== card.x) {
                $("#card-" + card.x).removeClass("light-background");
                $("#card-" + card.x).addClass("gray-background");
            }
        }
        

        area.off("animationend");
        area.one("animationend", () => {
            area.removeClass(animation);

            setTimeout(() => { this.game.passTurn(); }, 200);
            //this.game.passTurn();
        });
        area.addClass(animation);

    }

    clearTable() {
        $(".play").html("");

        for (let card of this.game.player[0].hand) {
            $("#card-" + card.x).removeClass("gray-backround");
            $("#card-" + card.x).addClass("light-backround");
        }
    }
}
