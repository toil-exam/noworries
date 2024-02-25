
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
    }

    getSpace(index) {
        return this.spaces[index];
    }

    getSpaces() {
        return this.spaces;
    }

    setSpace(index, value) {
        this.spaces[index] = value;
        this.gui.updateScore();
    }

    processPlayerMove(index) {
        // process player input from the gui, always from player input yeah?
        if (this.currentPlayer && this.getSpace(index) === " ") {
            this.gui.deactivateFace();
            this.gui.activateAIScreen();

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
        console.log("current face: " + this.gui.getFace());

        if (!GM.indexInFace(nextPlay, this.gui.getFace())) {
            // not on current face
            let side = "";
            let move = "";
            let face;
            for (const dir of GM.dirNames) {
                face = GM.transformMap[this.gui.getFace()][dir];
                face = face[0];
                if (face && GM.indexInFace(nextPlay, face)) {
                    side = face;
                    move = dir;
                    if (face === this.gui.getFace())
                        break;
                }
            }
            if (side !== "") {
                move = GM.addDirs(move, this.gui.getDir());
                move = GM.antiDir(move);
                setTimeout(() => this.gui.processRotate(move), 500);
            } else {
                move = GM.randomDir();
                setTimeout(() => this.gui.processRotate(move), 250);
                setTimeout(() => this.gui.processRotate(move), 250);
            }
        }

        const mark = "O";
        setTimeout(() => this.setSpace(nextPlay, mark), 750);
        this.currentPlayer = true;
        setTimeout(() => {
            this.gui.updateSpace(nextPlay)
            this.gui.activateFace();
            this.gui.deactivateAIScreen();
            console.log("current face: " + this.gui.getFace());
        }, 2000);

    }


    
    getScore() {
        const space = this.getSpaces();
        //const winmap = GM.winMap();
        let pc = 0;
        let ai = 0;
        //console.log(space);
        for (const win of GM.winMap()) {
            //console.log(win);
            //console.log(space[win[0]]);
            //console.log(space[win[1]]);
            //console.log(space[win[2]]);
            if (space[win[0]] === "X" && space[win[1]] === "X" && space[win[2]] === "X")
                pc++;
            if (space[win[0]] === "O" && space[win[1]] === "O" && space[win[2]] === "O")
                ai++;
        }
        const score = {"pc" : pc, "ai" : ai };
        //console.log(score);
        return score;
    }


}




const cube = new Cube();

});