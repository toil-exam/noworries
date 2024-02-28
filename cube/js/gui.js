

import { GM } from "/cube/js/gm.js";



export class GUI {
    constructor(cube) {
        this.cube = cube;
        this.board = $("#cubeBoard");
        this.dotInterval;
        this.lock = true;
        
        for (const dir of GM.dirNames) {
            const triggerFunction = () => { 
                if (this.isUnlocked())
                    this.processRotate(dir) 
            };
            $("#" + dir + "Button").on("click", triggerFunction); // attach event handlers to the dir buttons
        }

        // bind arrow keys 
        $(document).keydown((e) => { // gosh yeah let's invert
            if (this.isUnlocked()) {
                if (e.which === 38) // up
                    this.processRotate("up");
                else if (e.which === 39) // right
                    this.processRotate("right");
                else if (e.which === 40) // down
                    this.processRotate("down");
                else if (e.which === 37) // left
                    this.processRotate("left");
            }
        });

        //$("#overScreen").one("click", () => {
            $("#overScreen").hide();
        //});

        //this.deactivateAIScreen();

        this.resetGame();
        
    }

    setFace(face, dir) {
        //console.log("set face: " + face);
        this.currentFace = face;
        this.currentDir = dir;
    }

    getFace() { return this.currentFace; }

    getDir() { return this.currentDir; }

    resetGame(face = "sky", dir = "up") {
        const faces = $(".face");
        if (faces.length > 0) {
            faces.hide();
            faces.remove();
        }
        this.setFace(face, dir);
        this.buildFace(face, dir);
        this.activateFace();
    }

    relock() { this.lock = true; }
    unlock() { this.lock = false; }

    isLocked() { return this.lock; }
    isUnlocked() { return !this.lock; }


    processRotate(dir) {
        this.relock();
        // create new face
        const transformMap = GM.transformMap;
        const oldFace = this.getFace();
        const oldDir = this.getDir();
        
        let adjDir = GM.subDirs(dir, oldDir); // adjust current tilt with input direction
        
        const [newFace, newDir] = transformMap[oldFace][adjDir];
        const newAdjDir = GM.addDirs(newDir, oldDir);
        
        // adjust board area display : block vs flex pretty sure
        const orientation = GM.orientation(dir);
        let display;
        if (orientation === "horizontal")
            display = "flex";
        else if (orientation === "vertical")
            display = "block";
        this.board.css("display", display);
        
        const prepend = dir === "up" || dir === "left";
        this.buildFace(newFace, newAdjDir, prepend);
        
        // animate both faces
        const antiDir = GM.antiDir(dir);
        $("#face-" + oldFace).addClass("shrink-" + antiDir);
        $("#face-" + newFace).addClass("grow-" + antiDir);

        const gui = this;
        
        // callback to fire once the grow animation has finished 
        $("#face-" + newFace).one("animationend", () => {
            // remove old face 
            $("#face-" + oldFace).hide();
            $("#face-" + oldFace).remove();
            
            gui.setFace(newFace, newAdjDir);
            // remove animation from new face
            $("#face-" + newFace).removeClass("grow-" + antiDir);
            
            if (gui.cube.isPlayersTurn())
                gui.activateFace();
        });
        $("#face-" + newFace).show(); // technically this fires before the animationend
    }


    buildFace(faceName, dir, prepend = false) {
        if ($("#face-" + faceName).length)
            $("#face-" + faceName).remove();
        const face = $("<div>", { id: "face-" + faceName, class: "face" });
        if (faceName !== this.getFace())
            face.hide();
        prepend ? this.board.prepend(face) : this.board.append(face);

        const faceMap = GM.face(faceName, dir);
        const gui = this;
                
        for (let x = 0; x < 3; x++) {
            const row = $("<div>", { class: "row row" + x });
            face.append(row);

            for (let y = 0; y < 3; y++) {
                const index = faceMap[x][y];
                const value = this.cube.getSpace(index);

                let mark = "no-mark";
                if (value === "X") mark = "x-mark";
                else if (value === "O") mark = "o-mark";

                const space = $("<span>", { class: "space space-" + index + " " + mark});
                const container = $("<span>", { class: "container container-" + index});
                space.append(container);
                container.html(value);
                //space.on("mouseover", overFunction);
                row.append(space);
        
            }
        }

    }

    activateFace() {
        this.unlock();
        const faceName = this.getFace();
        const face = GM.faceIndexes(faceName);
        //console.log("activate: " + faceName);
        //console.log(face);
        const gui = this;
        for (const index of face) {
            //console.log("INDEX: " + index);
            if (this.cube.getSpace(index) === " ") {
                const clickFunction = () => {
                    gui.processPlayerMove(index);
                };
                $(".space-" + index).one("click", clickFunction);
            }
        }
    }

    deactivateFace() {
        //console.log("deactivate");
        this.relock();
        $(".space").off();
    }


    processPlayerMove(index) {
        // pass around the event
        this.cube.processPlayerMove(index);
    }

    updateSpace(index) {
        const value = this.cube.getSpace(index);
        const space = $(".space-" + index);
        const container = $(".container-" +index);
        
        let mark = "no-mark";
        if (value === "X") mark = "x-mark";
        else if (value === "O") mark = "o-mark";
        space.removeClass("no-mark x-mark o-mark");
        space.addClass(mark);
        container.html(value);

        if (mark !== "no-mark")
            space.off("click");
        //console.log("updated space " + index + " to " + value);
    }

    activateAIScreen() {
        $("#aiScreen").show();

        this.dotInterval = setInterval(() => {
            let dots = $(".dotDotDot").text();
            dots = dots.split(" ");
            if (dots.length < 5) {
                dots.push(".");
                dots = dots.join(" ");
            } else {
                dots = ".";
            }
            //console.log(dots);
            $(".dotDotDot").text(dots);
        }, 200);
    }

    deactivateAIScreen() {
        $("#aiScreen").hide();
        $(".dotDotDot").text(".");
        clearInterval(this.dotInterval);
    }


    updateScore() {
        const { pc, ai } = this.cube.getCurrentScore();
        $(".pc-score-text").text(pc);
        $(".ai-score-text").text(ai);
    }


    gameOver() {
        this.deactivateAIScreen();

        let { pc, ai } = this.cube.getCurrentScore();
        $("#pc-game-over-score").text(pc);
        $("#ai-game-over-score").text(ai);

        let { "pc": pcTotal, "ai": aiTotal } = this.cube.getTotalScore();
        console.log(pcTotal);
        console.log(aiTotal);

        $("#pc-total-score").text(pcTotal);
        $("#ai-total-score").text(aiTotal);

        $("#continueButton").one("click", () => {
            //$(".face").hide();
            //$(".face").remove();
            this.cube.resetGame();
            this.resetGame();
            $("#gameOverScreen").hide();
        });

        $("#gameOverScreen").css("display", "flex");
        $("#gameOverScreen").show();
    }
}
