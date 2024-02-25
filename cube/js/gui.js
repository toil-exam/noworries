

import { GM } from "/cube/js/gm.js";



export class GUI {
    constructor(cube) {
        this.cube = cube;
        this.board = $("#cubeBoard");
        for (const dir of GM.dirNames) {
            const triggerFunction = () => { this.processRotate(dir) };
            $("#" + dir + "Button").on("click", triggerFunction); // attach event handlers to the dir buttons
        }

        // bind arrow keys 
        $(document).keydown((e) => {
            if (e.which === 38) 
                this.processRotate("up");
            else if (e.which === 39) 
                this.processRotate("right");
            else if (e.which === 40) 
                this.processRotate("down");
            else if (e.which === 37) 
                this.processRotate("left");
        });

        this.resetGame();
        
    }

    setFace(face, dir) {
        this.currentFace = face;
        this.currentDir = dir;
    }

    getFace() { return this.currentFace; }

    getDir() { return this.currentDir; }

    resetGame(face = "sky", dir = "up") {
        this.setFace(face, dir);
        this.buildFace(face, dir);
    }


    processRotate(dir) {
        // create new face
        const transformMap = GM.transformMap;
        const oldFace = this.currentFace;
        const oldDir = this.currentDir;
        
        //console.log("////////////////////////");
        //console.log("// old face: " + oldFace + " + " + oldDir);
        let adjDir = GM.subDirs(dir, oldDir); // adjust current tilt with input direction
        adjDir = GM.antiDir(adjDir); // the map points in the direction of the face which is opposite to the input direction whoops
        
        //console.log("// click dir: " + dir + " -> " + adjDir);
        const [newFace, newDir] = transformMap[oldFace][adjDir];
        const newAdjDir = GM.addDirs(newDir, oldDir);
        
        // adjust board area display : block vs inline pretty sure
        const orientation = GM.orientation(dir);
        let display;
        if (orientation === "horizontal")
            display = "flex";
        else if (orientation === "vertical")
            display = "block";
        this.board.css("display", display);
        
        //console.log("// new face: " + newFace + " + " + newDir + " -> " + newAdjDir);
        const prepend = dir === "down" || dir === "right";
        this.buildFace(newFace, newAdjDir, prepend);
        
        // animate both faces
        $(".face-" + oldFace).addClass("shrink-" + dir);
        $(".face-" + newFace).addClass("grow-" + dir);
        
        $(".face-" + newFace).on("animationend", () => {
            // remove old face 
            $(".face-" + oldFace).hide();
            $(".face-" + oldFace).remove();
            
            this.setFace(newFace, newAdjDir);
            // remove animation from new face
            $(".face-" + newFace).removeClass("grow-" + dir);
            $(".face-" + newFace).off("animationend"); // is this neccessary ??
            $("#rightButton").removeClass("jolt-up jolt-left");
            $("#downButton").removeClass("jolt-up-twice");
            $("#leftButton").removeClass("jolt-up jolt-right");
            });
        $(".face-" + newFace).show(); // technically this fires before the animationend
        
        if (orientation === "horizontal") {
            $("#rightButton").addClass("jolt-left");
            $("#leftButton").addClass("jolt-right");
        } else if (orientation === "vertical") {
            $("#rightButton").addClass("jolt-up");
            $("#downButton").addClass("jolt-up-twice");
            $("#leftButton").addClass("jolt-up");
        }
    }


    buildFace(faceName, dir, prepend = false) {
        const face = $("<div>", { class: "face face-" + faceName });
        if (faceName !== this.cube.currentFace)
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
                const clickFunction = () => {
                    gui.processPlayerMove(index);
                    //console.log(index + ": " + value);
                };
                /*
                const overFunction = () => {
                    console.log("face: " + faceName + ", index: " + index);
                };
                */

                let mark = "no-mark";
                if (value === "X") mark = "x-mark";
                else if (value === "O") mark = "o-mark";

                const space = $("<span>", { class: "space space-" + index + " " + mark});
                const container = $("<span>", { class: "container container-" + index});
                space.append(container);
                container.html(value);
                //space.html(value);
                space.on("click", clickFunction);
                //space.on("mouseover", overFunction);
                row.append(space);
        
            }
        }

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
        space.off("click");
        //console.log("updated space " + index + " to " + value);
    }
}
