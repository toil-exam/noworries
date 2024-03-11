
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

    activatePlayerHand() {
        console.log("U S E R _ T U R N");
    }

    

}
