
import { GM } from "/cube/js/gm.js";
import { GUI } from "/cube/js/gui.js";
import { AI } from "/cube/js/ai.js";



class Cube {
    constructor() {
        this.resetGame();
        this.score = {"pc": 0, "ai": 0}; // cumulative score, gets added to after each game
        this.gui = new GUI(this);
        this.ai = new AI(this);
    }

    resetGame() {
        this.spaces = GM.clearBoard();
        //this.spaces = GM.gameOverTestBoard();
        this.setPlayer(true); // false is computer
    }

    getSpace(index) { return this.spaces[index]; }
    getSpaces() { return this.spaces; }

    setSpace(index, value) {
        this.spaces[index] = value;
        this.gui.updateScore();
    }

    setPlayer(input) { this.currentPlayer = input; }
    isPlayersTurn() { return this.currentPlayer; }

    processPlayerMove(index) {
        // process player input from the gui
        if (this.isPlayersTurn() && this.getSpace(index) === " ") {
            this.gui.deactivateFace();
            this.gui.activateAIScreen();

            const mark = "X";
            this.setSpace(index, mark);
            this.setPlayer(false);
            this.gui.updateSpace(index); // tell the gui to update

            if (!this.gameOverTest())
                this.triggerAI();
        }
    }

    triggerAI() {
        const nextPlay = this.ai.play();

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
                this.gui.processRotate(move);
            } else {
                move = GM.randomDir();
                this.gui.processRotate(move);
                setTimeout(() => this.gui.processRotate(move), 500);
            }
        }

        // not thrilled about using setTimeout, need to change to fire off animationend
        const mark = "O";
        setTimeout(() => this.setSpace(nextPlay, mark), 750);
        this.setPlayer(true);
        setTimeout(() => {
            this.gui.updateSpace(nextPlay)
            if(!this.gameOverTest())
                this.gui.activateFace();
            this.gui.deactivateAIScreen();
        }, 1000);

    }


    
    getCurrentScore() { // calculate score of current game state
        const space = this.getSpaces();
        let pc = 0;
        let ai = 0;
        for (const win of GM.winMap()) {
            if (space[win[0]] === "X" && space[win[1]] === "X" && space[win[2]] === "X")
                pc++;
            if (space[win[0]] === "O" && space[win[1]] === "O" && space[win[2]] === "O")
                ai++;
        }
        const score = {"pc" : pc, "ai" : ai };
        return score;
    }

    getTotalScore() { return this.score; } // cumulative score


    gameOverTest() {
        for (let i = 1; i < 28; i++) {
            if (i == 14) continue; // skip the hole in the middle of the cube
            if (this.getSpace(i) == " ") // empty space, game not over
                return false;
        }
        const { pc, ai } = this.getCurrentScore();

        this.score["pc"] += pc;
        this.score["ai"] += ai;
        
        this.gui.gameOver(); 
        return true;
    }
}




// when dom is ready
$(document).ready(function(){

    const cube = new Cube();

});