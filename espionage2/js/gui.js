



export class GUI {

    constructor(game) {
        this.game = game;
        this.gameScreen = $("#gameScreen");

        for (player in GM.player) {
            let area = $("<div>", {id: player.lower() + "Area"});
            area.html(player);
            this.gameScreen.append(area);

            let play = $("<div>", {id: player.lower() + "Play"});
            this.gameScreen.append(play);
        }
    }

    toggleScreen(input = null) {

        for (screen of GM.screens) {
            $("#" + screen + "Screen").hide();
        }
    
        if (input) {
            let screen = $("#" + input + "Screen");
            screen.show();
            if (input !== "game") {
                screen.one("click", () => {
                    screen.toggleScreen("game");
                });
            }
        }

        
    
    }

    

}
