
import { GM } from "/cube/js/gm.js";
import { GUI } from "/cube/js/gui.js";
import { AI } from "/cube/js/ai.js";


// when dom is ready
$(document).ready(function(){


class Cube {
    constructor() {
        this.resetGame();
        this.gui = new GUI(this);
        this.ai = new AI(this);
    }

    resetGame() {
        this.spaces = GM.clearBoard();
        this.currentPlayer = true; // false is computer
        this.currentFace = "sky"; // default
        this.currentDir = "up"; // default
    }

    getSpace(index) {
        return this.spaces[index];
    }

    getSpaces() {
        return this.spaces;
    }

    setSpace(index, value) {
        this.spaces[index] = value;
    }

    processPlayerMove(index) {
        // process player input from the gui, always from player input yeah?
        if (this.currentPlayer && this.getSpace(index) === " ") {
            const mark = "X";
            this.setSpace(index, mark);
            this.currentPlayer = false;
            //console.log("move processed: " + mark);
            this.gui.updateSpace(index); // tell the gui to update

            this.triggerAI();
        }
    }

    triggerAI() {
        const nextPlay = this.ai.play();

        if (!GM.indexInFace(nextPlay, this.currentFace)) {
            // not on current face
            let side = "";
            let move = "";
            let face;
            for (const dir of GM.dirNames) {
                face = GM.transformMap[this.currentFace][dir];
                face = face[0];
                if (face && GM.indexInFace(nextPlay, face)) {
                    side = face;
                    move = dir;
                    break;
                }
            }
            if (side !== "") {
                move = GM.subDirs(move, this.currentDir, "down");
                setTimeout(() => this.gui.processRotate(move), 1000);
            } else {
                move = GM.randomDir();
                setTimeout(() => this.gui.processRotate(move), 1000);
                setTimeout(() => this.gui.processRotate(move), 2000);
            }
        }

        const mark = "O";
        setTimeout(this.setSpace(nextPlay, mark), 3000);
        this.currentPlayer = true;
        setTimeout(this.gui.updateSpace(nextPlay), 4000);

    }

}





const cube = new Cube();

});